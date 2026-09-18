// abs
let a = -20;

console.log(Math.abs(a));


// round
let b = 3.1416;

console.log(b);

console.log(Number(b.toFixed(2)));


// max / min
let c = [4, 5, 6, 77, 8, 9];

let d = 23;

console.log(Math.max(...c));

console.log(Math.max(2, 3, 4, 65, 34, 23, 654));

console.log(Math.min(2, 3, 4, 65, 34, 23, 654));


// divmod(11, 5)
// Python: (quotient, remainder)
let quotient = Math.floor(11 / 5);
let remainder = 11 % 5;

console.log([quotient, remainder]);


// id(x)
// Python-এর id() এর direct equivalent JavaScript-এ নেই.
// JS primitive value-এর জন্য সাধারণত এভাবে করা হয় না.

let x = 10;

console.log(x);


// callable(print)
// JS-এ typeof দিয়ে function check করা যায়

console.log(typeof console.log === "function");


// eval
console.log(eval("23 + 34"));


// sum
console.log([2, 4, 5, 6, 3, 256].reduce((total, num) => total + num, 0));


// sorted
console.log("cabsals".split("").sort().join(""));


// slice
let text = "python";

console.log(text.slice(0, 4));


// for loop
let total = 1;

for (let i = 1; i < 5; i ++){
    console.log(i);
    total += 1;
    console.log(total);
}