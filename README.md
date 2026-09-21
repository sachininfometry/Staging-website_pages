# Infometry Staging Website Pages

Staging-only WordPress plugin workspace for testing Infometry page templates before
promoting approved changes to the live website. This repository and its Git history
must remain separate from the live `LiveHomepage` repository.

## Repository contents

- `infometry-custom-templates.php` — staging plugin bootstrap and route handling.
- `templates/page-home-design-test.php` — homepage template synchronized with live.
- `templates/page-infofiscus-conversa.php` — INFOFISCUS Conversa template synchronized with live.
- `templates/page-informatica-connectors.php` — Informatica Connectors template synchronized with live.
- `templates/page-google-cloud-connectors.php` — staging Google Cloud Connectors template.
- `templates/page-google-drive-connector.php` — staging Google Drive Connector template.
- `templates/page-snowflake-native-apps.php` — staging Snowflake Native Apps redesign.
- `assets/css/`, `assets/js/`, and `assets/images/` — page-scoped frontend assets.
- `preview-full.html`, `preview-conversa.html`, `preview-informatica.html`, and `preview-snowflake-native-apps.html` — local previews.
- `tools/` — preview generation and pre-deployment verification scripts.

## Local development

From this repository root, start a local static server:

```bash
python -m http.server 4190
```

Open:

- `http://127.0.0.1:4190/preview-full.html`
- `http://127.0.0.1:4190/preview-conversa.html`
- `http://127.0.0.1:4190/preview-informatica.html`
- `http://127.0.0.1:4190/preview-snowflake-native-apps.html`

After changing the Informatica or Snowflake PHP template, regenerate its standalone preview:

```bash
php tools/render-informatica-preview.php
php tools/render-snowflake-preview.php
```

Before every commit or deployment, run:

```powershell
.\tools\verify-project.ps1 -RegenerateInformaticaPreview -RegenerateSnowflakePreview
```

The same checks run in GitHub Actions on every push and pull request.

## WordPress staging installation

Deploy the repository root directly to:

```text
public_html/wp-content/plugins/infometry-custom-templates/
```

Then activate **Infometry Custom Templates** in the staging WordPress admin. The
plugin exposes all six templates in the Page Template selector. Staging-only slug
fallbacks are restricted to the configured Cloudways staging host.

Important staging routes include:

- `/product/informatica-connectors/`
- `/product/google-drive-connector/`
- the WordPress page slug `google-cloud-connectors`
- the WordPress page slug `snowflake-native-apps`

Deployment copies plugin files only. It does not modify WordPress core, BeTheme,
Theme Options, or database content.

## Safe promotion workflow

1. Create and test new page work in this staging repository.
2. Run the verification script and visually inspect desktop and mobile layouts.
3. Deploy the staging repository only to the staging plugin directory.
4. After approval, copy the approved page-specific changes to the live repository.
5. Verify the live repository independently before any production deployment.

Never point the staging Git deployment at the live repository or at `public_html/`
itself.
