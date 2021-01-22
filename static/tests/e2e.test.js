const puppeteer = require("puppeteer");

// tests each menu item can be added to cart and checks cart for instance of each
// tests each menu item can be removed from cart and checks cart is empty
test("should add each item to cart once, check to see items are in the cart, then remove each item", async () => {
  // set page to index
  const browser = await puppeteer.launch({
    // do not load browser
    headless: true,
    // slowMo: 200,
    // args: ["--window-size=2400,1400"],
  });
  const page = await browser.newPage();
  await page.goto("http://localhost/Restaurant/index.php");

  // get increment buttons and click each
  await page.$$eval("button.increment", (nodes) => nodes.map((n) => n.click()));

  // get cart items and create an array of item names
  const cart = await page.$("tbody");
  const cartItemsArray = await cart.$$eval(".cart-item", (nodes) =>
    nodes.map((n) => n.getAttribute("name"))
  );

  // create array of food items in the order they were appended to cartItemsArray
  const menuItemsArray = [
    "Pasta",
    "Club Sandwich",
    "Greek Salad",
    "Steak",
    "Nachos",
    "French Fries",
    "Poutine",
    "Burger",
  ];

  // gets decrement buttons and clicks each
  await page.$$eval("button.decrement", (nodes) => nodes.map((n) => n.click()));
  // look for any items remaining in cart
  const emptyCart = await cart.$(".cart-item");

  // check arrays are expected after adding items, and empty after removing them
  expect(menuItemsArray).toEqual(cartItemsArray);
  expect(emptyCart).toBeNull();

  // close browser
  await browser.close();
});
