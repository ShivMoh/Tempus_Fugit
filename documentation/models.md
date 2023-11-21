# Models Documentation

## Bill

- Bill Id
- Customer (Full Name)
- Number Items
- Total Cost
- Order Date
- Status
- MenuItemsList

## MenuItemForBill

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
- Image (s)
- Discount
- Tags
- Ingredients
