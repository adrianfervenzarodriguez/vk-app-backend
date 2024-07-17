## Vk App Backend
### Backend del proyecto [Vk App Frontend](https://github.com/adrianfervenzarodriguez/vk-app-frontend)
### API externa [Fk Twt API](https://github.com/adrianfervenzarodriguez/fk-twt-api)
### Instalación local
#### Clonar proyecto e instalar dependencias
```bash
git clone https://github.com/adrianfervenzarodriguez/vk-app-backend.git
cd vk-app-backend
composer install
```
#### Copiar .env.example a .env y sobreescribir las siguientes variables con tus datos locales
```bash
APP_URL=<url-local>
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
FK_TWITTER_EXTERNAL_API_URL="http://<url-local-api-externa>/api"
FK_TWITTER_EXTERNAL_API_TOKEN="<token-api-externa>"
```
### Ejecutar optimize (Prevenir errores de caché)
```bash
php artisan optimize
```
### Ejecutar migraciones
```bash
php artisan migrate
```
