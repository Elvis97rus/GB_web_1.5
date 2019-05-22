"use strict";

/**
 * Массив с загаданными цифрами
 * @var {array}
 */
let generatedNumbers;

/**
 * Число - количество попыток, которые пользователь уже совершил.
 * @var {int}
 */
let attemptsCount;

// Инициализируем переменные для игры.
resetGame();

// Начинаем игру.
startGame();

/**
 * Функция инициализирует игру - ставит все переменные в начальные значения, а именно переменные attemptsCount
 * в 0 и generatedNumbers в массив из 4 случайных не повторяющихся чисел.
 */
function resetGame() {
  // Количество попыток устанавливаем в 0.
  attemptsCount = 0;
  // Массив с загаданными цифрами пока оставим пустым, ниже его заполним.
  generatedNumbers = [];

  // Заполняем в массив generatedNumbers 4 неповторяющихся цифры [0, 9].
  // Цикл будет выполняться пока массив generatedNumbers будет длиной меньше 4 значений.
  while (generatedNumbers.length < 4) {
    // Получаем случайную цифру [0, 9].
    const part = Math.floor(Math.random() * 10);
    // Если мы не нашли в массиве generatedNumbers нашего случайной цифры part, то записываем ее.
    if (!generatedNumbers.includes(part)) {
      generatedNumbers.push(part);
    }
  }
}

/**
 * Функция запускает игру "Быки и коровы".
 */
function startGame() {
  // Запускаем бесконечный цикл, т.к. не знаем с какой попытки пользователь отгадает все цифры.
  while (true) {
    // Получаем от пользователя 4 цифры.
    const guess = prompt('Попробуйте отгадать 4 разных целых положительных цифры, загаданных компьютером.\n' +
      'Можете ввести -1 если хотите закончить игру.');

    // Проверяем не захотел ли пользователь выйти из игры, если захотел, прощаемся и выходим.
    if (guess === '-1') {
      // Если пользователь захотел выйти пишем что игра завершена и выходим из функции.
      return alert('Игра завершена.');
    }

    // Проверяем не ввел ли пользовтель некорректные данные.
    if (!isValidGuess(guess)) {
      // Если данные были некорректны, сообщаем об этом и начинаем новую итерацию.
      alert('Необходимо ввести 4 целых положительных цифры.');
      continue;
    }

    // Если мы дошли до этого момента, значит пользователь ввел правильное значение,
    // прибавляем к попыткам пользователя единицу.
    attemptsCount++;

    // Получаем результат от проверки ответа пользователя.
    const result = getGuessResult(guess);

    // Если при проверки цифр мы не получили 4-ех быков, значит пользователь не отгадал все цифры.
    if (result[0] !== 4) {
      // Сообщаем количество быков и коров.
      alert(`Быки: ${result[0]}. Коровы: ${result[1]}.`);
      // Начинаем новую итерацию.
      continue;
    }

    // Если мы не начали новую итерацию в ветвлении выше, значит пользователь угадал все цифры.
    alert(`Поздравляем! Вы угадали все цифры. Кол-во попыток: ${attemptsCount}.`);
    // Спрашиваем не хочет ли пользователь сыграть еще раз в эту игру.
    if (!confirm('Хотите сыграть еще раз?')) {
      // Если не хочет - выходим из функции.
      return alert('До свидания');
    }

    // Если пользователь захотел сыграть еще раз в эту игру, то снова инициализируем переменные
    // и пойдет новая итерация, игра продолжится.
    resetGame();
  }
}

/**
 * Функция осуществляет проверку переданного ей значения.
 * @param {string} guess Строка что ввел пользователь.
 * @returns {boolean} Если в этом аргументе будут 4 целых положительных цифры, тогда функция вернет true, иначе false.
 */
function isValidGuess(guess) {
  // Если символов не 4 сообщаем что валидация не пройдена.
  if (guess.length !== 4) {
    return false;
  }

  // Если любой из символов не целая цифра - сообщаем что валидация не пройдена.
  for (let i = 0; i < guess.length; i++) {
    if (Number.isNaN(parseInt(guess[i]))) {
      return false;
    }
  }

  // Если все проверки пройдены, сообщаем что данные успешно прошли проверку.
  return true;
}

/**
 * Функция принимает строку из 4-х символов (чисел) и проверяет ее на совпадение загаданных цифр и их местоположения.
 * @param {string} guess Строка с 4-мя цифрами что ввел пользователь.
 * @returns {int[]} Возвращает массив с двумя индексами 0 (количество быков) и 1 (количество коров).
 */
function getGuessResult(guess) {
  // Массив результата, который вернем из функции.
  // В result[0] - будут храниться быки, а в result[1] - коровы.
  const result = [0, 0];

  // У нас 4 цифры которые надо проверить на совпадение с теми, что загадал компьютер.
  for (let i = 0; i < guess.length; i++) {
    // Превращаем символ из строки guess под индексом i в число, чтоб не превращать 2 раза.
    const guessNumber = +guess[i];
    // Если пользователь отгадал и цифру и местоположение, добавляем единицу к быкам,
    // если пользователь отгадал только цифру, но она не на том месте, добавляем единицу к коровам.
    if (guessNumber === generatedNumbers[i]) {
      result[0]++;
    } else if (generatedNumbers.includes(guessNumber)) {
      result[1]++;
    }
  }

  // Возвращаем результат.
  return result;
}