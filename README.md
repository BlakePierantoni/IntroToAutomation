
# Happy Cars - App Modernization Workshop
The Happy Cars App Modernization Workshop is broken up into multiple phases. You can find each phase in its own branch



## Phase 1 - Traditional 
Phase 1 is a non containerized application running in EC2. This is to simulate a typical on prem environment


App Tier
- Ubuntu 18.04  
    - Host  
- PHP  
    - PHP in Apache  
- Apache2
    - Web Server  

DB Tier  
- MySQL  
    - Relational DB of Vehicle Inventory 

Deployment  
 - Terraform IAC  

Functions:  
 - Display Vehicles from MySQL to table in webpage
 - Average HP
 - Count of Cars
 - Top color and Count of color

# Phase Two
## Containerized 


App Tier
- Ubuntu 18.04  
    - Host  
- PHP  
    - PHP in Apache  
- Apache2
    - Web Server  

DB Tier  
- MySQL  
    - Relational DB of Vehicle Inventory 

Deployment  
 - Terraform IAC  

Functions:  
 - Display Vehicles from MySQL to table in webpage
 - Average HP
 - Count of Cars
 - Top color and Count of color

# Phase Three
## Refactored  

App Tier  

- Apache2 W/PHP (Container 1)  
    - Web Server - Create, Read, Update, Delete functions
- Apache2 W/PHP (Container 2)  
    - Web Server - Analytics functions

DB Tier  
- MySQL (Container 3)  
    - Relational DB of Vehicle Inventory  

Deployment  
 - Terraform IAC  

Microservices:  
 - Display Vehicles from MySQL to table in webpage  
 - Average HP  
 - Count of Cars  
 - Top color and Count of color  

# Phase Four
Placeholder

## Description

An in-depth paragraph about your project and overview of use.  

## Getting Started

### Dependencies

* Describe any prerequisites, libraries, OS version, etc., needed before installing program.  
* ex. Windows 10  

