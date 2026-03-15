# Harvest Tracking Information System

Information system for managing and tracking grape harvesting operations in vineyards.  
The application allows planning harvest schedules, managing workers, and recording harvested grape quantities.

This project was developed as part of a university software engineering assignment and demonstrates full-stack web development using the Laravel framework.

---

# Project Overview

The system digitalizes the grape harvesting process and enables:

• Planning harvest operations by vineyard sections  
• Managing workers participating in harvesting  
• Recording harvested grape quantities  
• Monitoring productivity and harvest results  
• Storing structured harvest data in a relational database  

The goal is to improve organization, transparency, and efficiency of vineyard harvest operations.

---

# Technologies Used

- PHP
- Laravel
- Blade templating engine
- MySQL
- Tailwind CSS
- Vite
- PHPUnit testing
- GitHub CI

---

# System Features

• Harvest planning by vineyard sections  
• Worker registration and management  
• Recording harvested grape quantities  
• Reporting and verification of harvest results  
• Automated database migrations and seeders  
• Unit and Feature testing  
• Continuous Integration (CI)

---

# Project Documentation

Full system specification, UML diagrams, and analysis are available in:


docs/evidencija-berbe-system-specification.docx


Documentation includes:

• System analysis  
• Use case diagrams  
• Activity diagrams  
• Sequence diagrams  
• Communication diagrams  
• ER database model  
• ORM class diagram  
• UI design  
• Implementation details  

---

# Installation

Clone the repository:


git clone https://github.com/MikovicA/evidencija-berbe.git


Install dependencies:


composer install
npm install


Configure environment:


cp .env.example .env
php artisan key:generate


Run migrations:


php artisan migrate


Start the server:


php artisan serve


---

# Testing

Run PHPUnit tests:


php artisan test


---

# Author

Aleksej Mikovic  
Software Engineering Student