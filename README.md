# Website User Guide

## 3.1 Introduction

### 3.1.1 Background

`NAHKA` is an ecommerce website for a client that makes and sells leather products. The project is built with PHP and makes use of no frameworks. The project has an ORM and makes use of OOP principles.

### 3.1.2 About this website

This website has been developed using advanced technologies to ensure a seamless user experience. The following technologies have been employed in its development:

- `PHP` was used to develop the backend of the website. It is a server-side scripting language that is used to create dynamic web pages.
- `MySQL` was used to develop the database of the website. It is an open-source relational database management system.
- `HTML`, `CSS`, and `JavaScript` were used to develop the frontend of the website. HTML is a markup language used to create web pages. CSS is a style sheet language used to describe the presentation of a document written in HTML. JavaScript is a programming language used to create interactive effects within web browsers.
- `Digital Ocean` Spaces was used to store the images of the products on the website. It is an object storage service that is compatible with the S3 API.
- `Digital Ocean App Platform` was used to deploy the website. It is a Platform-as-a-Service (PaaS) solution that allows developers to deploy their code directly from a GitHub repository.
- The Domain was acquired from `Name.com`.

## 3.2 Basics: Accessing your website and Admin

### 3.2.1 Accessing the website

To access the website, follow the link below:

- [Nahka Link](https://nahka.studio)

## 3.3 Products: Adding, removing, and updating products

### 3.3.1 Adding and Removing Products

Products can be easily added or removed from the website using the following steps:

1. With the provided database credentials `add` a product with the following SQL query:

    ```sql
    INSERT INTO products (product_name, product_description, price, image) VALUES ('product_name', 'product_description', 'price', 'image');
    ```

    Where 'image' is the name of the image file in the 'images' folder.

2. To `remove` a product, use the following SQL query:

    ```sql
    DELETE FROM products WHERE product_id = 'product_id';
    ```

3. Add the product image to the `products` folder in the Digital Ocean Spaces bucket.

### 3.3.2 Updating Products

To update specific product information, use the following SQL query:

```sql
UPDATE products SET product_name = 'product_name', product_description = 'product_description', price = 'price', image = 'image' WHERE product_id = 'product_id';
```

Where 'image' is the name of the image file in the 'images' folder.

## 3.5 Shipping Options

When the customer places an order, the cart details are emailed to the store owner. The store owner then contacts the customer to confirm the order and arrange for shipping.

## 3.6 The front page: adding and changing images

The front page contains the Featured Products section, which displays the products that are currently on sale. To add or change the images in this section, follow these steps:

- In the environment variables, change the `FEATURED_PRODUCTS` variable to the product IDs of the products you want to display, for example:

    ```php
    FEATURED_PRODUCTS=1,2,3
    ```

## 3.8 Orders

When a customer places an order on the website, the following actions take place:

- The order details are emailed to the store owner.
- The order details are stored in the database.

## 3.9 Updating a page on your site

The website is built using a routing system(or MVC). This means that each page on the website has its own controller and view. To update a page on the website, follow these steps:

1. Open the `src/controllers/PageController.php`  find the controller for the page you want to update. For example, if you want to update the home page, you would open the `src/controllers/PageController.php` file and find the `indexAction()` method.

    ```php
    public function indexAction(RouteCollection $routes)
    {
        $product = new Product();
        $featuredProducts = explode(',', FEATURED_PRODUCTS);
        $featuredProducts = $product->getFeaturedProducts($featuredProducts);
        $products = $product->getProducts();
        require_once "../src/Views/Partials/header.php";
        require_once "../src/Views/Partials/navbar.php";
        require_once __DIR__ . '/../Views/home.php';
        require_once "../src/Views/Partials/footer.php";
        }
    ```

    Here you can see that the `indexAction()` method is responsible for rendering the home page. To update the home page, you would need to update the `home.php` view file in the `src/Views` folder.

2. Open the `src/Views/home.php` file and make the necessary changes to the page.

3. To add a new page, add the view and controller files to the `src/Views` and `src/Controllers` folders respectively as well as adding the page route to the routecollection in the `src/routes/web.php` file.

    ```php
    $routes->add('newpage', new Route('/newpage', array('controller' => 'PageController', 'method' => 'newpageAction')));
    ```

    The above code adds a route for the page `/newpage` and maps it to the `newpageAction()` method in the `PageController` class.

## 3.11 Checking Web Traffic and Statistics

To track web traffic and gather statistics for your website, we utilize tools such as Google Analytics. These tools provide valuable insights into visitor behavior, demographics, and other key metrics.

[Explain the tools used on your website for tracking web traffic and gathering statistics, e.g., Google Analytics.]

## 3.12 Appendix

Use this section to provide any additional information or instructions on setting up the website.

Note: This user guide is intended as a general reference and may vary based on the specific implementation of the website.
