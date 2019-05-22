"use strict";

/**
 * Объект с настройками игры.
 * @property {int} rowsCount - Количество строк в карте.
 * @property {int} colsCount - Количество колонок в карте.
 * @property {string} darkCellColor - Цвет ячейки игрока.
 * @property {string} emptyCellColor - Цвет пустой ячейки.
 */
const settings = {
    rowsCount: 10,
    colsCount: 10,
    darkCellColor: '#D3D3D3',
    emptyCellColor: '#EEEEEE',
};

/**
 * Объект игры, здесь будут все методы и свойства связанные с ней.
 * @property {settings} settings Настройки игры.
 * @property {figures} figures Игровые фигуры.
 * @property {Array} cellElements Массив ячеек нашей игры.
 * @property {HTMLElement} containerElement Контейнер, где будет размещаться наша игра.
 * @property {Array} alphabet Массив, где содержатся буквы сетки поля.
 * @property {Array} numbers Массив, где содержатся цифры сетки поля.
 */
const game = {
    settings,
    figures,
    cellElements: null,
    containerElement: null,
    alphabet: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'],
    numbers: [1, 2, 3, 4, 5, 6, 7, 8],

    /**
     * Запускает игру.
     */
    run() {
        // Инициализируем игру.
        this.init();
    },

    /**
     * Инициирует все значения для игры.
     */
    init() {
        // Ставим контейнер игры.
        this.containerElement = document.getElementById('game');
        // Инициируем ячейки.
        this.initCells();
    },

    /**
     * Инициирует ячейки в игре.
     */
    initCells() {
        // Очищаем контейнер для игры.
        this.containerElement.innerHTML = '';
        // Массив ячеек пока пуст.
        this.cellElements = [];
        // Пробегаемся в цикле столько раз, какое количество строк в игре.
        for (let row = 0; row < this.settings.rowsCount; row++) {
            // Создаем новую строку.
            const trElem = document.createElement('tr');
            // Добавляем строку в контейнер с игрой.
            this.containerElement.appendChild(trElem);
            // В каждой строке пробегаемся по циклу столько раз, сколько у нас колонок.
            for (let col = 0; col < this.settings.colsCount; col++) {
                // Создаем ячейку.
                const cell = document.createElement('td');
                //запись значения(цифра/буква) в ячейку если выполняется условие
                if ((row === 0 || row === this.settings.rowsCount - 1) && col > 0 && col < this.settings.colsCount - 1) {
                    cell.appendChild(document.createTextNode(`${this.alphabet[col - 1]}`));
                } else if ((col === 0 || col === this.settings.colsCount - 1) && row > 0 && row < this.settings.rowsCount - 1) {
                    cell.appendChild(document.createTextNode(`${this.numbers[this.numbers.length - row]}`));
                }
                //изменение фона нечетных ячеек внутри игрового поля
                if (row > 0 && row < this.settings.rowsCount - 1 && col > 0 && col < this.settings.colsCount - 1 && (row + col) % 2 > 0) {
                    cell.style.backgroundColor = this.settings.darkCellColor;
                }
                // Записываем ячейку в массив ячеек.
                this.cellElements.push(cell);
                // Добавляем ячейку в текущую строку.
                trElem.appendChild(cell);
            }
        }
    },
};

// Запускаем игру.
window.onload = () => game.run();