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
    cellElements: null,
    containerElement: null,
    alphabet: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'],
    numbers: [1, 2, 3, 4, 5, 6, 7, 8],
    figures: [
        {name: 'p', color: 'w', pos: 'a2'},
        {name: 'p', color: 'w', pos: 'b2'},
        {name: 'p', color: 'w', pos: 'c2'},
        {name: 'p', color: 'w', pos: 'd2'},
        {name: 'p', color: 'w', pos: 'e2'},
        {name: 'p', color: 'w', pos: 'f2'},
        {name: 'p', color: 'w', pos: 'g2'},
        {name: 'p', color: 'w', pos: 'h2'},
        {name: 'p', color: 'b', pos: 'a7'},
        {name: 'p', color: 'b', pos: 'b7'},
        {name: 'p', color: 'b', pos: 'c7'},
        {name: 'p', color: 'b', pos: 'd7'},
        {name: 'p', color: 'b', pos: 'e7'},
        {name: 'p', color: 'b', pos: 'f7'},
        {name: 'p', color: 'b', pos: 'g7'},
        {name: 'p', color: 'b', pos: 'h7'},
        {name: 'Q', color: 'b', pos: 'd8'},
        {name: 'Q', color: 'w', pos: 'd1'},
        {name: 'K', color: 'b', pos: 'e8'},
        {name: 'K', color: 'w', pos: 'e1'},
        {name: 'N', color: 'b', pos: 'b8'},
        {name: 'N', color: 'w', pos: 'b1'},
        {name: 'N', color: 'b', pos: 'g8'},
        {name: 'N', color: 'w', pos: 'g1'},
        {name: 'R', color: 'b', pos: "a8"},
        {name: 'R', color: 'w', pos: 'a1'},
        {name: 'R', color: 'b', pos: 'h8'},
        {name: 'R', color: 'w', pos: 'h1'},
        {name: 'B', color: 'b', pos: 'c8'},
        {name: 'B', color: 'w', pos: 'c1'},
        {name: 'B', color: 'b', pos: 'f8'},
        {name: 'B', color: 'w', pos: 'f1'},
    ],
    figuresHtml: {
        Kw: '&#9812;',
        Qw: '&#9813;',
        Rw:'&#9814;',
        Bw:'&#9815;',
        Nw: '&#9816;',
        pw: '&#9817;',
        Kb: '&#9818;' ,
        Qb: '&#9819;',
        Rb:'&#9820;',
        Bb:'&#9821;',
        Nb: '&#9822;',
        pb: '&#9823;',
    },

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
        //Инициируем расстановку фигур
        this.initFigures();
    },

    /**
     * Инициирует игральные фигуры из объекта.
     */
    initFigures(){
        let cellName=null;
        for (let cell=0;cell<this.cellElements.length;cell++){
            cellName = this.cellElements[cell].getAttribute('data-name');
            //выбираем ячейки с атрибутами, кроме центральных(1,2,7,8 ряды)
            if (cellName!=null &&
                (cellName[1]==='8'||cellName[1]==='7'||cellName[1]==='2'||cellName[1]==='1')){
                this.cellElements[cell].innerHTML = this.findFigure(cellName);//${cellName}
            }
        }
    },
    /**
     * Поиск фигуры соответствующей своей позицией названию(атрибуту ) поля
     * возвращает строку или undefined т_т
     */
    findFigure(cellName){
        // for (const figure in this.figures){
        for (let figure = 0;figure<this.figures.length;figure++) {
            if(this.figures[figure].pos === cellName){
                return  this.figuresHtml[this.figures[figure].name + this.figures[figure].color];//
            }
        }
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
                if ((row === 0 || row === this.settings.rowsCount - 1) && col > 0
                    && col < this.settings.colsCount - 1) {
                    cell.appendChild(document.createTextNode(`${this.alphabet[col - 1]}`));
                } else if ((col === 0 || col === this.settings.colsCount - 1) && row > 0
                    && row < this.settings.rowsCount - 1) {
                    cell.appendChild(document.createTextNode(`${this.numbers[this.numbers.length - row]}`));
                }
                //изменение фона нечетных ячеек внутри игрового поля, присвоение аттрибута каждой !игровой! клетке
                if (row > 0 && row < this.settings.rowsCount - 1 && col > 0 && col < this.settings.colsCount - 1) {
                    if ((row + col) % 2 > 0) {
                        cell.style.backgroundColor = this.settings.darkCellColor;
                    }//cell.dataset.name почему то ошибку выкинул, в cell же лежит тег ТД - тоже тег как и button(из видео)
                    cell.setAttribute('data-name',
                        `${this.alphabet[col - 1]}${this.numbers[this.numbers.length - row]}`);
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