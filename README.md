Stage Zero ( Laravel Cat Fact API )

A lightweight Laravel project demonstrating how to consume external APIs, return structured JSON responses, and show developer metadata with timestamps.

> 🔗 Repository: [github.com/mykelphilip/zero](https://github.com/mykelphilip/stagehng)


🚀 Features

* Fetches random cat facts from [CatFact Ninja API](https://catfact.ninja/fact)
* Returns formatted JSON with developer info and UTC timestamp
* Example of Laravel’s HTTP client in action
* Simple and educational — perfect for beginners learning API consumption in Laravel



🧰 Requirements

| Dependency | Version |
| ---------- | ------- |
| PHP        | 8.1+    |
| Composer   | 2.x     |
| Laravel    | 10+     |
| cURL       | Enabled |
| OpenSSL    | Enabled |

---

⚙️ Setup Instructions
1️⃣ Clone the Repository

```bash
git clone https://github.com/mykelphilip/zero.git
cd zero
```

2️⃣ Install Dependencies

```bash
composer install
```

3️⃣ Create Environment File

```bash
cp .env.example .env
```

Then generate the app key:

```bash
php artisan key:generate
```

4️⃣ Configure Environment Variables

In your `.env` file, ensure these are set:

```env
APP_NAME=Zero
APP_ENV=local
APP_KEY=base64:your_generated_key_here
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

# Database (optional if not used)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=zero
DB_USERNAME=root
DB_PASSWORD=

# HTTP Client (Laravel default uses Guzzle)


> ⚠️ If you encounter SSL/TLS issues (like `cURL error 60`), download and configure a CA certificate:
> [https://curl.se/ca/cacert.pem](https://curl.se/ca/cacert.pem)


🧩 Run Locally

Start the local Laravel development server:

```bash
php artisan serve
```

By default, the app runs at:

```
http://127.0.0.1:8000
```

---

🧠 API Endpoint — `/cat-fact`

📘 Route

Add this to your `routes/web.php` or `routes/api.php` if you are building an API as Well:

```php
use App\Http\Controllers\FactController;

Route::get('/cat-fact', [FactController::class, 'getFact']);
```

📜 Function Definition

```php
public function getFact(Request $request)
{
    $user = [
        'name' => 'Michael Philip Funguy',
        'email' => 'michaelfunguycjnr@gmail.com',
        'stack' => 'Laravel, PHP, Vue.js, MySQL, Docker, Move',
    ];

    $response = Http::get('https://catfact.ninja/fact');
    $response = json_decode($response->body(), true)['fact'];
    $time = \Carbon\Carbon::now('UTC')->toIso8601String();

    return response()->json([
        'status' => 'success',
        'user' => $user,
        'timestamp' => $time,
        'fact' => $response
    ]);
}
```


RESULT
📦 JSON Response

```json
{
  "status": "success",
  "user": {
    "name": "Michael Philip Funguy",
    "email": "michaelfunguycjnr@gmail.com",
    "stack": "Laravel, PHP, Blade, MySQL, Docker"
  },
  "timestamp": "2025-10-18T18:45:32Z",
  "fact": "Cats sleep 70% of their lives."
}
```


🧩 Dependencies

Laravel will automatically install the following packages:

* `laravel/framework`
* `guzzlehttp/guzzle`
* `nesbot/carbon`
* `vlucas/phpdotenv`

To install manually:

```bash
composer require guzzlehttp/guzzle nesbot/carbon
```

🔐 Environment Variables Summary

| Variable    | Description                             |
| ----------- | --------------------------------------- |
| `APP_ENV`   | Set environment (`local`, `production`) |
| `APP_KEY`   | Application encryption key              |
| `APP_DEBUG` | Debug mode (true/false)                 |
| `APP_URL`   | Base URL of your app                    |
| `DB_*`      | Database credentials (if applicable)    |


🧑‍💻 Author

Michael Philip aka Funguy
📧 [michaelfunguycjnr@gmail.com](mailto:michaelfunguycjnr@gmail.com)
💻 Stack: Laravel • PHP • Vue.js • MySQL • Docker • Move

---

⭐ Contribute

Want to improve the project?

1. Fork the repo
2. Create a feature branch (`git checkout -b feature/your-feature`)
3. Commit and push your changes
4. Open a pull request



🐾 License

This project is open-source under the [MIT License](LICENSE).


