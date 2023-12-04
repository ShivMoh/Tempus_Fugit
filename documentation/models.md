# Models Documentation

## Bill

- Bill Id
- Number of Items
- Total Cost
- Order Date
- Status

## BillItem

- ItemId
- Name
- Price
- Total
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
