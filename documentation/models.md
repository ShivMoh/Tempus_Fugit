# Models Documentation

## Bill

- Bill Id
- Customer (Full Name)
- Number Items
- Total Cost
- Order Date
- Status
- MenuItemsList

_Note to self: When creating a Bill, the attached Bill Items must afterwards be created and linked to the newly created Bill_

## BillItem

- ItemId
- Name
- Price
- Amount
- Bill Id - links to bill (many to one)
- Menu Item Id - links to the menu item (one to one)


## Employee

- Employee Id
- First Name
- Last Name
- Other Names
- Gender
- Age
- DOB
- Job Role
- Email
- Contact Number
- Status

## MenuItem

- Item Id
- Name
- Price
- Description
- Image url (s)
- Discount
- Tags
- Ingredients
