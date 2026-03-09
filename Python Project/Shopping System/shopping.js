const readline = require("readline");

console.log("Welcome to smart shopping system");

let total = 0;
let count = 0;

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

function askPrice() {
  rl.question("Enter the price of the product (press 0 to stop): ", function(input) {

    let price = parseFloat(input);

    if (price === 0) {

      if (count === 0) {
        console.log("No item purchased");
        rl.close();
        return;
      }

      console.log("\nTotal Items:", count);
      console.log("Total Price:", total);

      let discount = 0;

      if (total >= 5000) {
        discount = total * 0.20;
      } 
      else if (total >= 2000) {
        discount = total * 0.10;
      }

      let afterDiscount = total - discount;

      let vat = afterDiscount * 0.05;

      let finalBill = afterDiscount + vat;

      console.log("Total Bill:", total);
      console.log("Discount:", discount);
      console.log("VAT 5%:", vat);
      console.log("Final Bill:", finalBill.toFixed(2));
      console.log("Cash Payable:", Math.ceil(finalBill));

      rl.close();
    }

    else if (price < 0) {
      console.log("Invalid price");
      askPrice();
    }

    else {
      total = total + price;
      count = count + 1;
      askPrice();
    }

  });
}

askPrice();