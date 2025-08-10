# Calvince Online Shop - E-Commerce Website

A fully functional e-commerce website built with PHP, MySQL, and Bootstrap. This platform allows users to browse products, add items to cart, and complete purchases, while providing an admin panel for managing products, categories, and orders.

## 🚀 Features

### User Features
- **Product Browsing**: Browse products by categories and brands
- **Shopping Cart**: Add/remove items from cart with quantity management
- **User Registration & Login**: Secure user authentication system
- **Product Search**: Search products by name or category
- **Order Management**: View order history and track orders
- **Responsive Design**: Mobile-friendly interface using Bootstrap 5

### Admin Features
- **Product Management**: Add, edit, and delete products with image upload
- **Category Management**: Create and manage product categories
- **Brand Management**: Add and manage product brands
- **Order Management**: View and manage customer orders
- **User Management**: View registered users and their activities
- **Dashboard**: Overview of products, orders, and users

## 🛠️ Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework**: Bootstrap 5
- **Icons**: Font Awesome
- **Images**: Product images with upload functionality

## 📁 Project Structure

```
calvince-website/
├── index.php                 # Homepage
├── product_view.php          # Product listing
├── product_detail.php        # Single product view
├── cart.php                  # Shopping cart
├── checkout.php              # Checkout process
├── user_login.php            # User login
├── user_registration.php     # User registration
├── myorders.php              # User order history
├── admin/
│   ├── index.php             # Admin dashboard
│   ├── insert_products.php   # Add new products
│   ├── view_products.php     # View all products
│   ├── edit_products.php     # Edit products
│   ├── view_categories.php   # Manage categories
│   ├── view_brands.php       # Manage brands
│   └── view_details.php      # View product details
├── includes/
│   └── connect.php           # Database connection
├── functions/
│   └── common_function.php   # Common PHP functions
├── photos/                   # Product images
├── userimage/                # User profile images
├── css/                      # Stylesheets
└── README.md
```

## 🗄️ Database Schema

### Tables
- `products` - Product information
- `categories` - Product categories
- `brands` - Product brands
- `users` - User accounts
- `cart_details` - Shopping cart items
- `orders` - Order information
- `order_details` - Order items

### Key Fields
- Products: id, title, description, price, image, category_id, brand_id
- Users: id, username, email, password, user_address, user_mobile
- Orders: order_id, user_id, amount, invoice_number, order_date, order_status

## 🚀 Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (optional)

### Steps

1. **Clone the repository**
   ```bash
   git clone [repository-url]
   cd calvince-website
   ```

2. **Create database**
   ```sql
   CREATE DATABASE calvince_shop;
   USE calvince_shop;
   ```

3. **Import database schema**
   ```sql
   -- Run the SQL file to create tables
   -- (Database file should be provided separately)
   ```

4. **Configure database connection**
   Edit `includes/connect.php`:
   ```php
   <?php
   $servername = "localhost";
   $username = "your_username";
   $password = "your_password";
   $dbname = "calvince_shop";
   
   $con = mysqli_connect($servername, $username, $password, $dbname);
   if(!$con) {
       die("Connection failed: " . mysqli_connect_error());
   }
   ?>
   ```

5. **Upload to web server**
   - Place all files in your web server's document root
   - Ensure proper file permissions

6. **Access the website**
   - User site: `http://localhost/calvince-website/`
   - Admin panel: `http://localhost/calvince-website/admin/`

## 🔧 Configuration

### Admin Credentials
- Default admin credentials should be set up during installation
- Change default credentials immediately after setup

### Environment Variables
Create a `.env` file for sensitive information:
```
DB_HOST=localhost
DB_NAME=calvince_shop
DB_USER=your_username
DB_PASS=your_password
```

## 📸 Screenshots

### Homepage
- Responsive product grid
- Category and brand filters
- Search functionality

### Product Page
- Detailed product information
- Image gallery
- Add to cart functionality

### Admin Dashboard
- Product management interface
- Order tracking system
- User management panel

## 🔐 Security Features

- **Password Hashing**: User passwords are hashed using PHP's password_hash()
- **SQL Injection Prevention**: Prepared statements used for all database queries
- **Session Management**: Secure session handling for user authentication
- **Input Validation**: Server-side validation for all user inputs
- **File Upload Security**: Image upload restrictions and validation

## 🧪 Testing

### User Testing
1. Register a new account
2. Browse products by category/brand
3. Add products to cart
4. Complete checkout process
5. View order history

### Admin Testing
1. Login to admin panel
2. Add new products with images
3. Manage categories and brands
4. View and process orders
5. Update product information

## 📱 Responsive Design

The website is fully responsive and works on:
- Desktop computers
- Tablets (iPad, Android)
- Mobile phones (iPhone, Android)

## 🎯 Future Enhancements

- [ ] Payment gateway integration (PayPal, Stripe)
- [ ] Product reviews and ratings
- [ ] Wishlist functionality
- [ ] Email notifications
- [ ] Inventory management
- [ ] Discount codes and promotions
- [ ] Multi-language support
- [ ] SEO optimization

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Support

For support, email calvince@example.com or create an issue in the GitHub repository.

## 🙏 Acknowledgments

- Bootstrap team for the responsive framework
- Font Awesome for icons
- PHP and MySQL communities
- All contributors and testers

---

**Built with ❤️ by Walibora**
