<?php

declare(strict_types=1);

/**
 * Domain System Themes - Sync Tool
 *
 * Sincroniza o código-fonte de um tema do core (domain-system)
 * para este repositório e executa o build oficial.
 *
 * Uso:
 *   php tools/sync-theme.php rachidd_store
 */

$themesRepoDir = dirname(__DIR__);
$coreThemeDir = dirname($themesRepoDir) . '/domain-system/src/Plugins/flextheme/themes';

$target = $argv[1] ?? 'rachidd_store';
$src = $coreThemeDir . '/' . $target;
$dst = $themesRepoDir . '/themes/' . $target;

if (!is_dir($src)) {
    fwrite(STDERR, "❌ Erro: Tema '{$target}' não encontrado em '{$src}'.\n");
    exit(1);
}

function recursiveCopy(string $src, string $dst): void {
    if (!is_dir($dst)) mkdir($dst, 0755, true);
    $dir = opendir($src);
    while (($file = readdir($dir)) !== false) {
        if ($file === '.' || $file === '..') continue;
        $s = $src . '/' . $file;
        $d = $dst . '/' . $file;
        if (is_dir($s)) recursiveCopy($s, $d);
        else copy($s, $d);
    }
    closedir($dir);
}

function recursiveDelete(string $dir): void {
    if (!is_dir($dir)) return;
    $files = array_diff(scandir($dir) ?: [], ['.', '..']);
    foreach ($files as $file) {
        $p = $dir . '/' . $file;
        is_dir($p) ? recursiveDelete($p) : unlink($p);
    }
    rmdir($dir);
}

echo "🔄 Sincronizando tema '{$target}' do Core...\n";
if (is_dir($dst)) recursiveDelete($dst);
recursiveCopy($src, $dst);
echo "✅ Tema '{$target}' sincronizado!\n\n";

// Executa o empacotamento
require_once __DIR__ . '/build-themes.php';