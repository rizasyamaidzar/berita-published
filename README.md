# Berita-Published
<p>Berita-Published is a news portal that I developed using Laravel and TailwindCSS. This website has complete features for news management, including:</p>
<ul>
    <li>Login and Authentication: Users can register and login to gain access to deeper features, such as writing and managing news.</li>
    <li>CMS (Content Management System): There are features for creating, reading, updating, and deleting news and categories. Users with certain access rights can manage content efficiently.</li>
    <li>Search and Pagination: Users can easily search for news by title or category, and the search results will be displayed with a pagination system for an easier experience.</li>
    <li>Integration API: This website is also equipped with an API that allows third parties to retrieve news and category data.</li>
    <li>Responsive and Dynamic: With the use of TailwindCSS, the website display is responsive and dynamic on various devices.
This website is designed to provide a fast and intuitive user experience, while ensuring effective news content management for admins.</li>
</ul>
<hr>  
<h1>Installation Instructions</h1>

Follow these steps to set up the project locally:

1. Clone the repository:
   ```bash
   git clone https://github.com/rizasyamaidzar/berita-published.git
   cd berita-published
2. Install PHP dependencies using Composer:
   ```bash
   composer install
3. Install Node.js dependencies:
   ```bash
   npm install
4. Copy the example environment file and configure your environment:
   ```bash
   cp .env.example .env
5. Create a database with the same name as in your .env file.
6. Create a symbolic link for file storage:
   ```bash
   php artisan storage:link
7. Run the database migrations and seed the database:
   ```bash
   php artisan migrate --seed
8. Compile the assets using Vite:
   ```bash
   npm run dev
9. Start the local development server:
   ```bash
   php artisan serve



