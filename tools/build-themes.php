<?php

declare(strict_types=1);

/**
 * Domain System Themes - Build & Package Tool
 *
 * Itera pelos temas em /themes, valida theme.json,
 * gera pacotes ZIP em /dist e atualiza themes.json (catálogo oficial).
 */

$rootDir = dirname(__DIR__);
$themesDir = $rootDir . '/themes';
$distDir = $rootDir . '/dist';
$catalogFile = $rootDir . '/marketplace.json';

if (!is_dir($themesDir)) {
    fwrite(STDERR, "❌ Erro: Diretório /themes não encontrado.\n");
    exit(1);
}

if (!is_dir($distDir)) {
    mkdir($distDir, 0755, true);
}

$entries = scandir($themesDir) ?: [];
$catalog = [
    'updated_at' => date('c'),
    'repository' => 'https://github.com/hadelrachid/domain-system-themes',
    'themes' => []
];

$successCount = 0;

foreach ($entries as $entry) {
    if ($entry === '.' || $entry === '..') {
        continue;
    }

    $themePath = $themesDir . '/' . $entry;
    if (!is_dir($themePath)) {
        continue;
    }

    $manifestPath = $themePath . '/theme.json';
    if (!is_file($manifestPath)) {
        echo "⚠️  Pulando '{$entry}': theme.json não encontrado.\n";
        continue;
    }

    $meta = json_decode((string)file_get_contents($manifestPath), true);
    if (!is_array($meta)) {
        echo "⚠️  Pulando '{$entry}': theme.json inválido.\n";
        continue;
    }

    $name = (string)($meta['name'] ?? $entry);
    $title = (string)($meta['title'] ?? $name);
    $version = (string)($meta['version'] ?? '1.0.0');
    $author = (string)($meta['author'] ?? 'Rachid');
    $description = (string)($meta['description'] ?? '');

    $zipName = $entry . '.zip';
    $zipPath = $distDir . '/' . $zipName;

    // Remove zip anterior se existir
    if (file_exists($zipPath)) {
        unlink($zipPath);
    }

    $zip = new ZipArchive();
    if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
        fwrite(STDERR, "❌ Falha ao criar ZIP para '{$entry}'.\n");
        continue;
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($themePath, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($iterator as $file) {
        if (!$file->isFile()) {
            continue;
        }

        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($themePath) + 1);
        $relativePath = str_replace('\\', '/', $relativePath);

        // Inclui arquivos com prefixo do diretório do tema
        $zip->addFile($filePath, $entry . '/' . $relativePath);
    }

    $zip->close();

    $sha256 = hash_file('sha256', $zipPath);
    file_put_contents($distDir . '/' . $entry . '.sha256', $sha256);
    $sizeBytes = filesize($zipPath);

    $catalog['themes'][$entry] = [
        'name' => $name,
        'title' => $title,
        'version' => $version,
        'author' => $author,
        'description' => $description,
        'download_url' => "https://github.com/hadelrachid/domain-system-themes/releases/latest/download/{$zipName}",
        'sha256' => $sha256,
        'size_bytes' => $sizeBytes
    ];

    $sizeKb = number_format($sizeBytes / 1024, 1);
    echo "✅ Tema '{$name}' v{$version} empacotado: {$zipName} ({$sizeKb} KB)\n";
    $successCount++;
}

file_put_contents(
    $catalogFile,
    json_encode($catalog, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
);

echo "\n📦 Total de temas empacotados: {$successCount}\n";
echo "📄 Catálogo de temas gerado em: {$catalogFile}\n";