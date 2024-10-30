<?php

// Пункт 1: Створення базового PHP-скрипта
// Виводимо текст "Hello, World!" на екран
echo "Hello, World!"; // Вивід повідомлення
echo "<br>"; // Перехід на новий рядок

// Пункт 2: Змінні та типи даних
// Оголошуємо змінні різних типів
$stringVar = "Це рядок"; // Рядок
$intVar = 10; // Ціле число
$floatVar = 10.5; // Число з плаваючою комою
$boolVar = true; // Булеве значення

// Виводимо значення змінних на екран
echo $stringVar . "<br>"; // Вивід рядка
echo $intVar . "<br>"; // Вивід цілого числа
echo $floatVar . "<br>"; // Вивід числа з плаваючою комою
echo $boolVar . "<br>"; // Вивід булевого значення (true)

// Виводимо тип кожної змінної
var_dump($stringVar); // Тип рядка
var_dump($intVar); // Тип цілого числа
var_dump($floatVar); // Тип з плаваючою комою
var_dump($boolVar); // Тип булевого значення

// Пункт 3: Конкатенація рядків
// Створюємо дві змінні з рядковими значеннями
$firstName = "Олена";
$lastName = "Петренко";

// Об'єднуємо змінні в один рядок та виводимо результат
$fullName = $firstName . " " . $lastName;
echo "<br>" . $fullName . "<br>"; // Вивід повного імені

// Пункт 4: Умовні конструкції
// Створюємо змінну з будь-яким числовим значенням
$number = 5;

// Реалізуємо умовну конструкцію if-else
if ($number % 2 == 0) {
    echo "Число $number парне.<br>"; // Якщо парне
} else {
    echo "Число $number непарне.<br>"; // Якщо непарне
}

// Пункт 5: Цикли
// Використовуючи цикл for, виводимо на екран числа від 1 до 10
for ($i = 1; $i <= 10; $i++) {
    echo $i . " "; // Вивід числа
}
echo "<br>"; // Перехід на новий рядок

// Використовуючи цикл while, виводимо на екран числа від 10 до 1
$j = 10;
while ($j >= 1) {
    echo $j . " "; // Вивід числа
    $j--; // Зменшення значення
}
echo "<br>"; // Перехід на новий рядок

// Пункт 6: Масиви
// Створюємо асоціативний масив, що містить інформацію про студента
$studentInfo = [
    "ім'я" => "Олена",
    "прізвище" => "Петренко",
    "вік" => 20,
    "спеціальність" => "Програмування"
];

// Виводимо значення кожного елемента масиву на екран
foreach ($studentInfo as $key => $value) {
    echo "$key: $value<br>";
}

// Додаємо новий елемент до масиву, що зберігає середній бал студента
$studentInfo["середній бал"] = 4.5;

// Виводимо оновлений масив
echo "Оновлений масив:<br>";
foreach ($studentInfo as $key => $value) {
    echo "$key: $value<br>";
}
?>
