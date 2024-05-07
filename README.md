# Tia's Groceries

Tia's Groceries is an online grocery shopping website developed using PHP, MySQL, and deployed on AWS Elastic Beanstalk. This project allows users to search for products, add them to their shopping cart, and proceed to checkout.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Deployment](#deployment)
- [Dependencies](#dependencies)
- [Contributing](#contributing)
- [License](#license)

## Features

- Search for products
- View product details
- Add products to the shopping cart
- View and update the shopping cart
- Proceed to checkout

## Installation

To run this project locally, follow these steps:

1. Clone this repository to your local machine.
2. Make sure you have PHP and MySQL installed on your system.
3. Import the `database.sql` file into your MySQL database to create the necessary tables.
4. Update the database configuration in `db_connection.php` with your MySQL credentials.
5. Start a local web server (e.g., using XAMPP or WAMP).
6. Access the website through the web server.

## Usage

- Use the search bar to find products by name.
- Click on a product to view its details.
- Click the "Add to Cart" button to add a product to your shopping cart.
- View and update your shopping cart by clicking on the cart icon.
- Proceed to checkout by clicking on the checkout button.

## Deployment

To deploy this project to AWS Elastic Beanstalk:

1. Zip the project files
2. Create an Elastic Beanstalk environment with PHP platform.
3. Upload the zip file to Elastic Beanstalk and deploy the application.
4. Configure the database settings in the Elastic Beanstalk environment variables.
5. Access the deployed application using the provided URL.

## Dependencies

This project relies on the following dependencies:

- PHP 7.x
- MySQL
- AWS Elastic Beanstalk

## Contributing

Contributions are welcome! Please fork this repository and create a pull request with your proposed changes.

## License

This project is licensed under the [MIT License](LICENSE).
