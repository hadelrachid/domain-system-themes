# Domain-System Themes Hub 🎨

> Diretório oficial, catálogo aberto e intermediário de vitrines visuais para o **[Domain-System OS (CockPit)](https://github.com/hadelrachid/domain-system)**.

Este repositório funciona como o **Portal Central e Loja de Temas (Marketplace)** do ecossistema Domain-System:

* **Descentralização Total:** Cada tema é hospedado em seu próprio repositório dedicado no GitHub, sob o controle do seu autor, com seu próprio ciclo de desenvolvimento, commits e releases independentes.
* **Aberto a Desenvolvedores:** Qualquer desenvolvedor ou designer pode criar seu próprio tema para o Domain-System em seu próprio perfil do GitHub e catalogá-lo aqui.
* **Canal Oficial de Curadoria:** Reúne e homologa os temas comunitários e oficiais em um catálogo estruturado (`marketplace.json`) consumido diretamente pelo painel administrativo do sistema.

Todos os temas deste ecossistema são distribuídos sob a licença **MIT** e desenhados para funcionar perfeitamente com o **Domain-System OS**.

---

## 🎨 Temas Oficiais & Comunitários Disponíveis

| Tema / Slug | Repositório no GitHub | Autor | Versão | Estilo & Propósito |
| :--- | :--- | :---: | :---: | :--- |
| **RachidD Store** | [hadelrachid/rachidd_store](https://github.com/hadelrachid/rachidd_store) | Rachid | `v1.0.0` | Vitrine de alta conversão inspirada no AliExpress e *Mil e Uma Noites* (Lâmpada Mágica, Desejos do Dia, Busca Global) focada em Dropshipping. |

---

## 🚀 Como Baixar e Instalar Temas no Domain-System (CockPit)

1. Acesse o **repositório dedicado** do tema desejado (ex: [rachidd_store](https://github.com/hadelrachid/rachidd_store)) e vá para a aba **[Releases]**.
2. Baixe o pacote compactado oficial `{slug}.zip` da versão estável.
3. Abra o painel administrativo do seu site **Domain-System (CockPit)** em `/admin`.
4. No menu lateral, acesse **Aparência > Temas** (ou Painel de Temas).
5. No topo da página, clique no botão **Instalar Tema (.zip)**.
6. Selecione o arquivo `.zip` baixado e clique em **Instalar Agora**.
7. O sistema descompactará os arquivos com segurança na pasta `themes/{slug}`.
8. No card do tema instalado, clique em **Ativar e Publicar** para transformar imediatamente a identidade visual do seu site.

---

## 🔄 Atualizações Automáticas em 1 Clique

O painel de administração do **Domain-System** conta com um verificador integrado que consulta periodicamente os repositórios oficiais:
* Se o tema instalado estiver na versão mais recente, o botão exibirá **Atualizado** (desabilitado).
* Quando uma nova versão for publicada no repositório dedicado, o Cockpit exibirá um alerta e habilitará o botão azul **"Atualizar vX.X.X"**, permitindo atualização rápida e segura com um clique.

---

## 🛠️ Como Criar e Publicar Seu Próprio Tema

Deseja criar um tema para o Domain-System e publicá-lo em seu próprio repositório?

1. **Estrutura Mínima de um Tema:**
   ```text
   meu-tema/
   ├── assets/          # CSS, JavaScript, imagens e fontes
   ├── layouts/
   │   └── main.php     # Layout mestre do frontend
   ├── partials/
   │   ├── header.php   # Cabeçalho da página
   │   └── footer.php   # Rodapé da página
   ├── templates/
   │   └── home.php     # Template da página inicial
   ├── index.php        # Ponto de entrada do tema
   └── theme.json       # Manifesto de metadados do tema
   ```

2. **Manifesto `theme.json` Obrigatório:**
   ```json
   {
       "name": "meu_tema",
       "title": "Meu Tema Incrível",
       "version": "1.0.0",
       "author": "Seu Nome",
       "description": "Breve descrição visual do layout e estilo."
   }
   ```

3. **Hospedagem:** Suba o código no seu repositório GitHub e crie uma tag de release (ex: `v1.0.0`) contendo o arquivo `meu_tema.zip`.
4. **Submissão ao Hub:** Abra um Pull Request incluindo seu tema no arquivo `marketplace.json` deste repositório para que todos os usuários do Domain-System possam descobri-lo e instalá-lo!

---

## 📄 Licença

Distribuído sob a licença **MIT**. Consulte o arquivo [LICENSE](LICENSE) para mais informações.
