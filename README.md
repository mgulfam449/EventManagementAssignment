# ButterCup Event Management System - Full Setup Guide

A complete Event Booking & Admin Management project built with PHP, MySQL (Docker), Bootstrap, and jQuery. This system supports:
- Admin Portal (Add/Edit/Delete records)
- User Portal (Book Wedding/Party/Corporate Events)

---

##  Prerequisites

Please ensure the following software is installed on your system:

1. **[XAMPP](https://www.apachefriends.org/index.html)** – for Apache & PHP
2. **[Docker Desktop](https://www.docker.com/products/docker-desktop)** – for running MySQL via container
3. **Git** – optional (or you can download ZIP manually)
4. **Modern Web Browser** – e.g., Chrome

---

## Project Folder Structure

You should have two main folders:

- `ButterCupAdmin/` → Admin portal (backend, event management)
- `ButterCupmain/` → User portal (frontend booking)

Both go inside:  
`C:/xampp/htdocs/`

---

## Step 1: Setup MySQL using Docker

Create a file named `docker-compose.yml` in your root directory with the following content:

```yaml
version: '3.1'

services:
  db:
    image: mysql:5.7
    restart: always
    environment:
      MYSQL_DATABASE: eventdb
      MYSQL_USER: eventuser
      MYSQL_PASSWORD: eventpass
      MYSQL_ROOT_PASSWORD: rootpass
    ports:
      - "3306:3306"
