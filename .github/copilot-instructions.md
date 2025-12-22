<!-- Auto-generated guidance for AI coding agents working on this repo -->
# Copilot instructions for SuplementosFacil

Purpose
- Short: help AI agents be productive editing this PHP MVC app (controllers, DAOs, models, views).

Big picture
- This is a small PHP MVC-style app (no framework). Main folders:
  - `app/controllers/` — HTTP entrypoints and business logic (e.g. `SuplementoController.php`).
  - `app/dao/` — database access (DAOs use `getConnection()` from `config/banco.php`).
  - `app/models/` — plain PHP model objects with getters/setters.
  - `app/views/` — PHP view templates (per-resource folders like `suplementos/`).
  - `public/` — static assets; `public/imagens/` holds image paths referenced by models.
  - `config/banco.php` — PDO MySQL connection (local dev uses database `suplementosfacil`).

Typical request flow (example)
- URL pattern: `index.php?controller=suplemento&action=listar` → `SuplementoController::listar()` → calls `SuplementoDAO->listarTodos()` and `SuplementoNutrienteDAO->buscarNutrientesPorSuplemento()` → renders `app/views/suplementos/listar.php`.

Project-specific patterns to follow
- Controllers instantiate DAOs directly (no DI container). Change controller behavior, not DAO signatures, unless you must.
- DAOs call `getConnection()` from `config/banco.php` and use PDO prepared statements. When adding/removing model fields, update DAO SQL queries (INSERT/UPDATE/SELECT) and model getters/setters together.
- Image uploads: controllers validate mime with `finfo_file()` and set image path as `public/imagens/<name>`; the code typically does not move files automatically — preserve this pattern or update views and controller consistently.
- Auth: session-based. Many controllers call a private `protegerPainel()` that checks `$_SESSION['usuario_id']` and redirects to `index.php?controller=usuario&action=login` when unauthenticated.

Database & local setup
- Database file: `suplementosfacil.sql` at project root. Import into MySQL/PhpMyAdmin for local testing.
- Dev DB connection: `config/banco.php` uses `new PDO("mysql:host=localhost;dbname=suplementosfacil", "root", "")` — update credentials for other environments.
- Quick import (local dev):
  - Using MySQL client: `mysql -u root -p suplementosfacil < suplementesfacil.sql`
  - Or import via phpMyAdmin.

What to change and where (concrete examples)
- Add a field to `Suplemento`:
  1. Edit `app/models/Suplemento.php` to add property + getter/setter.
  2. Update `app/dao/SuplementoDAO.php` SQL (`INSERT`, `UPDATE`, `SELECT` mapping) and parameter arrays.
  3. Update `app/controllers/SuplementoController.php` to read/write the new `$_POST` field and pass to model.
  4. Update view templates in `app/views/suplementos/` to display/edit the new field.

Testing & debugging notes
- No automated tests are present. Run the app on XAMPP/Apache and use the web UI for manual verification.
- Typical debugging: enable display_errors in `php.ini`, or add temporary `var_dump()`/`error_log()` statements in controller/DAO.

Safety and conventions for AI edits
- Preserve routing and controller action names (`listar`, `cadastrarForm`, `cadastrar`, `editarForm`, `atualizar`, `deletar`).
- Keep SQL parameterization (PDO prepared statements) — do not revert to interpolated queries.
- When modifying file uploads, ensure MIME checks use `finfo_file()` as existing code does.
- Keep session checks intact for protected pages; add granular permission checks only with the user's consent.

Useful files to inspect
- `app/controllers/SuplementoController.php` — example controller handling file upload and nutrient linking.
- `app/dao/SuplementoDAO.php` — DAO showing INSERT/UPDATE/SELECT patterns.
- `config/banco.php` — DB connection factory.
- `suplementosfacil.sql` — initial schema and seed data.

If something is unclear
- Ask the repository owner which environment credentials to use, whether image files should be moved on upload, and whether to introduce dependency injection or keep the current direct-instantiation pattern.

End.
