
fetch("./assets/data/products.json")
  .then(res => res.json())
  .then(products => {
    console.log(products);
    products.forEach(product => {
      switch (product.name){
        case "CoffeeVN":
          coffeeVN.push(product);
          console.log(coffeeVN);
          break;
      }
    });
    
  })
  .catch(err => console.log(err));

export const coffeeVN = [];

// cà phê máy
export const machineCoffee = [];

// Coldbrew
export const coldBrew = [];

// Trà trái cây
export const fruitTea = [];

// Macchiato
export const macchiatoMilkTea = [];

// Đá xay
export const grindIce = [];

// matcha - socola
export const matchaSocola = [];

// bánh mặn
export const saltyCake = [];

// bánh ngọt
export const sweetCake = [];

// snack
export const snack = [];

// cà phê tại nhà
export const coffeeAtHome = [];

// trà tại nhà
export const teaAtHome = [];

