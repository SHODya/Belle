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

function updateTotalPrice() {
  let totalPriceElements = document.querySelectorAll(".total-price");
  let totalPriceSum = 0;
  totalPriceElements.forEach(function (element) {
    let borderDiv = element.closest(".border-div");
    let quantityInput = borderDiv.querySelector(".quantity-input");
    let itemPrice = borderDiv.querySelector(".item-price");
    let quantity = parseInt(quantityInput.value);
    let total = quantity * parseFloat(itemPrice.textContent);
    element.textContent = total.toFixed(0);
    totalPriceSum += total;
  });
  document.querySelector(".end-price").textContent = totalPriceSum.toFixed(0);
}

document.querySelectorAll(".quantity-control").forEach(function (item) {
  const minusBtn = item.querySelector(".minus");
  const plusBtn = item.querySelector(".plus");
  const quantityInput = item.querySelector(".quantity-input");

  minusBtn.addEventListener("click", function () {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
      quantityInput.value = currentValue - 1;
      updateTotalPrice();
    }
  });

  plusBtn.addEventListener("click", function () {
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
    updateTotalPrice();
  });

  quantityInput.addEventListener("input", function () {
    updateTotalPrice();
  });
});

function addToOrders(
  totalQuantity,
  totalPrice,
  deliveryPoint,
  userId,
  productList
) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/config/addToOrders.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Handle success
        showNotification("Failed to add order");
      } else {
        // Handle error
        showNotification("Order added successfully");
      }
    }
  };

  const data = new URLSearchParams();
  data.append("totalQuantity", totalQuantity);
  data.append("userId", userId);
  data.append("totalPrice", totalPrice);
  data.append("productList", productList);
  data.append("deliveryPoint", deliveryPoint);

  xhr.send(data);
}

document.addEventListener("DOMContentLoaded", function () {
  updateTotalPrice();

  const deliveryButtons = document.querySelectorAll(".delivery-button");
  let selectedDelivery = ""; // Переменная для хранения выбранного пункта выдачи

  deliveryButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      event.stopPropagation();
      // Сбрасываем стиль у всех кнопок
      deliveryButtons.forEach((btn) => {
        btn.style.color = "gray";
      });

      // Устанавливаем стиль для выбранной кнопки
      button.style.color = "black";

      selectedDelivery = button.dataset.delivery;
    });
  });

  const orderButton = document.querySelectorAll(".order-button");
  orderButton.forEach((button) => {
    button.addEventListener("click", function () {
      let deliveryPoint = selectedDelivery;
      updateTotalPrice(); // Обновляем общую стоимость заказа
      let totalPrice = document.querySelector(".end-price").textContent; // Получаем общую стоимость из соответствующего элемента
      let userId = button.getAttribute("data-user-id");
      let totalQuantity = document.querySelectorAll(".quantity-input").length;
      let productList = ""; // Наименования всех товаров
      document
        .querySelectorAll(".margin-left-20 p:first-child")
        .forEach(function (item) {
          productList += item.textContent.trim() + ", ";
        });
      productList = productList.slice(0, -2); // Удаляем последнюю запятую и пробел
      userId = parseInt(userId);
      totalQuantity = parseInt(totalQuantity);
      totalPrice = parseInt(totalPrice);
      addToOrders(productList, userId, totalQuantity, totalPrice, deliveryPoint);
    });
  });
});
