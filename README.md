🐾 StageZeroHNG – Laravel Cat Fact API

A lightweight Laravel project demonstrating how to consume external APIs, return structured JSON responses, and show developer metadata with timestamps.
A simple Laravel API that returns developer info, a random cat fact, and a timestamp.
📦 Repo: [https://github.com/mykelphilip/stagehng](https://github.com/mykelphilip/stagehng)


⚙️ 1️⃣ Prerequisites

Make sure you have these installed locally (LAMP stack):

* Linux / Apache / MySQL / PHP (8.1 or higher)
* Composer
* Git
* Postman (for API testing)

---

🧩 2️⃣ Clone the Project

```bash
git clone https://github.com/mykelphilip/stagehng.git
cd stagehng
```

---

🧩 3️⃣ Install Dependencies

```bash
composer install
```

---

🧩 4️⃣ Setup Environment File

Duplicate the example environment file:

```bash
cp .env.example .env
php artisan key:generate
```

> Note: This project does not require a database connection, so you can skip editing DB credentials.

---

🧩 5️⃣ Serve the Application

Run the Laravel development server:

```bash
php artisan serve
```

This will start the server at:

```
http://127.0.0.1:8000
```

---

🧩 6️⃣ Test the API Using Postman

1. Open Postman
2. Create a GET request:

   ```
   http://127.0.0.1:8000/api/me
   ```
3. Hit Send

✅ Expected JSON response:

```json
{
  "status": "success",
  "user": {
    "name": "Michael Philip Funguy",
    "email": "michaelfunguycjnr@gmail.com",
    "stack": "Laravel, PHP, Vue.js, MySQL, Docker"
  },
  "timestamp": "2025-10-19T12:00:00Z",
  "fact": "Cats sleep 70% of their lives."
}
```

---

🧠 Endpoint Reference

| Method | Endpoint | Description                                              |
| ------ | -------- | -------------------------------------------------------- |
| GET    | `/api/me`    | Returns developer info, timestamp, and a random cat fact |

---

🧰 Troubleshooting

❌ 1. `php artisan view:cache` or `config:cache` Fails

Fix: Clear all caches before re-running the command.

```bash
php artisan optimize:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

❌ 2. `Class "App\Http\Controllers\CatController" not found`

Fix: Make sure your controller file exists and matches the namespace:

```
app/Http/Controllers/CatController.php
```

Then run:

```bash
composer dump-autoload
```

---

❌ 3. SSL or TLS Issues (on local setup)

If your local machine throws `cURL error 60`, disable SSL verification temporarily in your request:

```php
$response = Http::withoutVerifying()->get('https://catfact.ninja/fact');
```

(Not recommended for production)

---

❌ 4. Blank Response or Timeout

Make sure your system is connected to the internet —
the API fetches data from `https://catfact.ninja/fact`.

---

✅ That’s it! you’re fully set up to run and test the StageZeroHNG Laravel API locally!

