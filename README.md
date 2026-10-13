# Infometry Staging Website Pages

Staging-only WordPress plugin workspace for testing Infometry page templates before
promoting approved changes to the live website. This repository and its Git history
must remain separate from the live `LiveHomepage` repository.

## Repository contents

- `infometry-custom-templates.php` — staging plugin bootstrap and route handling.
- `templates/pages/home/` — homepage template synchronized with live.
- `templates/products/infofiscus-conversa/` — INFOFISCUS Conversa template synchronized with live.
- `templates/products/informatica-connectors/` — Informatica Connectors template synchronized with live.
- `templates/products/google-cloud-connectors/` — staging Google Cloud Connectors template.
- `templates/products/google-drive-connector/` — staging Google Drive Connector template.
- `templates/products/snowflake-native-apps/` — staging Snowflake Native Apps redesign.
- `templates/case-studies/asana-fdp-snowflake-modernization/` — staging Asana FDP Snowflake case-study redesign.
- `templates/case-studies/insurance-snowflake-modernization/` — staging insurance Snowflake modernization case study.
- `templates/case-studies/sunrun-enterprise-data-analytics/` — staging Sunrun case study (template label "Sunrise Case Study").
- `assets/css/{pages,products,case-studies}/` — page-scoped stylesheets, named after their template.
- `assets/js/` — page-scoped scripts, named after their template.
- `assets/images/` — images. Not reorganized: their plugin URLs are public and may be referenced from page content.

### Template keys are not file paths

WordPress stores each page's selected template as a key in `_wp_page_template`
(for example `templates/page-home-design-test.php`). Those keys are kept unchanged
for backward compatibility; `infometry_ct_template_path()` in the bootstrap maps each
key to its current file. When adding a template, add a new key **and** a map entry;
never edit an existing key.
- `preview-full.html`, `preview-conversa.html`, `preview-informatica.html`, `preview-snowflake-native-apps.html`, `preview-asana-fdp-case-study.html`, and `preview-insurance-snowflake-case-study.php` — local previews.
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
- `http://127.0.0.1:4190/preview-asana-fdp-case-study.html`
- `http://127.0.0.1:4190/preview-insurance-snowflake-case-study.php`

After changing the Informatica or Snowflake PHP template, regenerate its standalone preview:

```bash
php tools/render-informatica-preview.php
php tools/render-snowflake-preview.php
php tools/render-asana-fdp-preview.php
```

Before every commit or deployment, run:

```powershell
.\tools\verify-project.ps1 -RegenerateInformaticaPreview -RegenerateSnowflakePreview -RegenerateAsanaFdpPreview
```

The same checks run in GitHub Actions on every push and pull request.

## WordPress staging installation

Deploy the repository root directly to:

```text
public_html/wp-content/plugins/infometry-custom-templates/
```

Then activate **Infometry Custom Templates** in the staging WordPress admin. The
plugin exposes all eight templates in the Page Template selector. Staging-only slug
fallbacks are restricted to the configured Cloudways staging host.

Important staging routes include:

- `/product/informatica-connectors/`
- `/product/google-drive-connector/`
- the WordPress page slug `google-cloud-connectors`
- the WordPress page slug `snowflake-native-apps`
- `/resources/infometry-case-studies/financial-data-platform-fdp-modernization-on-snowflake/`

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
