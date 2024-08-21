# Acme Widget Co Sales System

## Introduction

This is a proof of concept for the Acme Widget Co sales system. It allows adding products to a basket, calculates the total cost considering delivery charges, and applies special offers.

## Setup

1. Clone the repository.
2. Install dependencies with `composer install`.
3. Serve the application using `php artisan serve`.

## Usage

Access the `/basket` route to add products and see the total. Modify the route for different product combinations.

## Assumptions

- Delivery charges and offers are passed during initialization.
- The special offer currently implemented is "Buy one red widget, get the second half price."
