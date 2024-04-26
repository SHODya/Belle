// Объявляем переменные на уровне скрипта для доступа ко всему скрипту
let selectedSize = ""; // Переменная для хранения выбранного размера
let selectedColor = ""; // Переменная для хранения выбранного цвета

// Определение функции addToCart
function addToCart(
  productId,
  userId,
  quantity,
  price,
  name,
  imagePath,
  size,
  color
) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/config/addToCart.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Handle success
        console.log("Product added to cart successfully");
      } else {
        // Handle error
        console.error("Failed to add product to cart");
      }
    }
  };

  const data = new URLSearchParams();
  data.append("productId", productId);
  data.append("userId", userId);
  data.append("quantity", quantity);
  data.append("price", price);
  data.append("name", name);
  data.append("image", imagePath);
  data.append("size", size);
  data.append("color", color); // Добавляем значение цвета

  xhr.send(data);
}

// Определение функции showNotification
function showNotification(message) {
  // Создаем элемент уведомления
  const notification = document.createElement("div");
  notification.textContent = message;
  notification.classList.add("notification");

  // Добавляем стили для уведомления
  notification.style.position = "fixed";
  notification.style.top = "50%";
  notification.style.left = "50%";
  notification.style.transform = "translate(-50%, -50%)";
  notification.style.padding = "10px";
  notification.style.background = "rgba(0, 0, 0, 0.8)";
  notification.style.color = "#fff";
  notification.style.fontFamily = "Arial, sans-serif";
  notification.style.fontSize = "16px";
  notification.style.borderRadius = "5px";
  notification.style.zIndex = "9999";

  // Добавляем уведомление на страницу
  document.body.appendChild(notification);

  // Через 3 секунды удаляем уведомление
  setTimeout(() => {
    notification.remove();
  }, 3000);
}

// Обработчик события DOMContentLoaded
document.addEventListener("DOMContentLoaded", function () {
  const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
  addToCartButtons.forEach((button) => {
    button.addEventListener("click", function () {
      let productId = button.dataset.productId;
      let name = button.dataset.name;
      let price = button.dataset.price;
      let userId = button.dataset.userId;
      let quantity = 1;
      let imagePath = button
        .closest(".product-main")
        .querySelector(".product-image")
        .getAttribute("src");
      productId = parseInt(productId);
      userId = parseInt(userId);
      quantity = parseInt(quantity);
      price = parseInt(price);

      // Считываем значение цвета в момент нажатия на кнопку
      const colorElement = button
        .closest(".product-main")
        .querySelector(".product-color");
      if (colorElement) {
        selectedColor = colorElement.textContent.trim();
      }

      console.log(
        `Adding product to cart: <p>Product ID: ${productId} (тип: ${typeof productId})</p>, Name: ${name} (тип: ${typeof name}), Price: ${price} (тип: ${typeof price}), User ID: ${userId} (тип: ${typeof userId}), Quantity: ${quantity} (тип: ${typeof quantity}), Image Path: ${imagePath}, Size: ${selectedSize}, Color: ${selectedColor}`
      );
      if (selectedSize && selectedColor) {
        addToCart(
          productId,
          userId,
          quantity,
          price,
          name,
          imagePath,
          selectedSize,
          selectedColor
        ); // Передаем выбранный размер и цвет в функцию addToCart
      } else {
        showNotification("Пожалуйста, выберите размер"); // Выводим ошибку, если размер или цвет не выбраны
      }
    });
  });

  const sizeButtons = document.querySelectorAll(".white-btn.size-btn");
  sizeButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      event.stopPropagation();
      // Сбрасываем стиль у всех кнопок
      sizeButtons.forEach((btn) => {
        btn.style.borderWidth = "1px";
      });
  
      // Устанавливаем стиль для выбранной кнопки
      button.style.borderWidth = "3px";
  
      // Получаем значение размера из текста кнопки
      selectedSize = button.textContent.trim();
  
      // Обновляем значение переменной selectedSize
      selectedSize = button.dataset.size;
  
      // Проверяем, что значение selectedSize установлено правильно
      console.log("Selected size:", selectedSize);
    });
  });




});