# Domain-System Themes Hub 🎨

> Official directory, open catalog, and themes intermediary for the **[Domain-System OS (CockPit)](https://github.com/hadelrachid/domain-system)** ecosystem.

This repository serves as the **Central Hub and Marketplace** for Domain-System themes:

* **Complete Decentralization:** Each theme is hosted within its own dedicated GitHub repository under its author's ownership, with an independent lifecycle, commits, and releases.
* **Open to Creators:** Any developer or designer can build a theme for Domain-System, host it on their own GitHub profile, and index it here.
* **Curated Distribution Channel:** Gathers and certifies official and community themes into a structured catalog (`marketplace.json`) consumed directly by the CockPit admin board.

All themes are distributed under the **MIT** license and crafted for **Domain-System OS**.

---

## 🎨 Available Official & Community Themes

| Theme / Slug | GitHub Repository | Author | Version | Style & Purpose |
| :--- | :--- | :---: | :---: | :--- |
| **RachidD Store** | [hadelrachid/rachidd_store](https://github.com/hadelrachid/rachidd_store) | Rachid | `v1.0.0` | High-conversion storefront inspired by AliExpress and *Arabian Nights* (Magic Lamp, Daily Wishes, Global Search) tailored for Dropshipping. |

---

## 🚀 How to Download & Install Themes in Domain-System (CockPit)

1. Open the **dedicated repository** of the desired theme (e.g., [rachidd_store](https://github.com/hadelrachid/rachidd_store)) and navigate to the **[Releases]** section.
2. Download the official `{slug}.zip` bundle for the latest stable release.
3. Log in to your **Domain-System (CockPit)** admin dashboard at `/admin`.
4. In the sidebar menu, select **Appearance > Themes** (Themes Panel).
5. Click the **Install Theme (.zip)** button at the top of the page.
6. Select the downloaded `.zip` file and click **Install Now**.
7. The system unpacks the theme files securely into `themes/{slug}`.
8. On the installed theme card, click **Activate & Publish** to instantly apply the visual storefront.

---

## 🔄 1-Click Automated Upgrades

The **Domain-System** administration panel includes a background update checker that queries official repositories:
* When your theme is up-to-date, the card displays **Up-to-Date** (disabled).
* When a new version is released on the dedicated repository, CockPit raises an alert and activates the blue **"Update to vX.X.X"** button for instant one-click upgrades.

---

## 🛠️ How to Build & Publish Your Own Theme

Want to build a custom theme for Domain-System and host it in your own repository?

1. **Required Theme Folder Structure:**
   ```text
   my-theme/
   ├── assets/          # CSS, JavaScript, images, and fonts
   ├── layouts/
   │   └── main.php     # Frontend master layout
   ├── partials/
   │   ├── header.php   # Page header partial
   │   └── footer.php   # Page footer partial
   ├── templates/
   │   └── home.php     # Homepage template
   ├── index.php        # Theme entry point
   └── theme.json       # Required metadata manifest
   ```

2. **Mandatory `theme.json` Manifest:**
   ```json
   {
       "name": "my_theme",
       "title": "My Awesome Theme",
       "version": "1.0.0",
       "author": "Your Name",
       "description": "Short summary of your layout style and target audience."
   }
   ```

3. **Hosting:** Push the code to your GitHub repository and draft a tagged release (e.g. `v1.0.0`) attaching `my_theme.zip`.
4. **Hub Submission:** Submit a Pull Request adding your theme to `marketplace.json` in this repository so that Domain-System users can discover and install it!

---

## 📄 License

Distributed under the **MIT** license. See the [LICENSE](LICENSE) file for more details.
