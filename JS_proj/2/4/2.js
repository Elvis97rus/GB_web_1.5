"use strict";


const settings ={
    rowCount:10,
    colCount:10,
    startPosX:1,
    startPosY:2,
};

const player = {
    x: null,
    y: null,
    /**
     *Функция инициализации начальной локации игрока
     * @param startX
     * @param startY
     */
    init(startX,startY){
        this.x = startX;
        this.y = startY;
    },
    /**
     *Функция перемещения игрока
     * @param {int} direction - целое число введенное пользователем
     */
    move(direction) {
        switch (direction) {
            case 2:
                if (player.moveAvailableYmax())
                    this.y++;
                break;
            case 4:
                if (player.moveAvailableXmin())
                    this.x--;
                break;
            case 6:
                if (player.moveAvailableXmax())
                    this.x++;
                break;
            case 8:
                if (player.moveAvailableYmin())
                    this.y--;
                break;
            case 7:
                if (player.moveAvailableXmin() && player.moveAvailableYmin()){
                    this.y--;
                    this.x--;
                }
                break;
            case 9:
                if (player.moveAvailableXmax() && player.moveAvailableYmin()){
                    this.y--;
                    this.x++;
                }
                break;
            case 1:
                if (player.moveAvailableYmax() && player.moveAvailableXmin()){
                    this.y++;
                    this.x--;
                }
                break;
            case 3:
                if (player.moveAvailableXmax() && player.moveAvailableYmax()){
                    this.y++;
                    this.x++;
                }
                break;
        }
    },
    /**
     *Функция проверки возможности ходить направо (true - если можно)
     * @returns {boolean}
     */
    moveAvailableXmax(){
        if (this.x < settings.colCount-1 ){
            return true;
        }
    },
    /**
     *Функция проверки возможности ходить налево (true - если можно)
     * @returns {boolean}
     */
    moveAvailableXmin(){
        if (this.x > 0){
            return true;
        }
    },
    /**
     *Функция проверки возможности ходить вниз (true - если можно)
     * @returns {boolean}
     */
    moveAvailableYmax(){
        if (this.y < settings.rowCount-1){
            return true;
        }
    },
    /**
     *Функция проверки возможности ходить вверх (true - если можно)
     * @returns {boolean}
     */
    moveAvailableYmin(){
        if (this.y >0){
            return true;
        }
    },
};

const game = {
    settings, //settings: settings,
    player, //player: player,

    /**
     * Функция запуска игры, хода игрока и отрисовки поля
     */
    run() {
        this.player.init(this.settings.startPosX,this.settings.startPosY);
        console.log('Game begins');

        while (true){
            this.render();

            const direction = this.getDirection();

            if(direction === -1){
                alert('bye');
                return;
            }

            this.player.move(direction);
            alert('PLAYER STEP');
        }
    },
    /**
     * Функция отрисовки игрового поля и очистки консоли
     */
    render(){

        let map="";
        for (let row = 0; row<this.settings.rowCount;row++){
            for (let col = 0; col<this.settings.colCount;col++) {
                if(this.player.y === row && this.player.x === col){
                    map += "O ";
                } else {
                    map += 'X ';
                }
            }
            map += '\n';
        }
        console.clear();
        console.log(map);
    },


    /**
     * Функция получения следующего хода от пользователя
     * @returns {number} direction - Возвращает "цифру направления движения"
     */
    getDirection(){
        const avalibleDirections = [-1,1,2,3,4,6,7,8,9];

        while (true){
            const direction = parseInt(prompt(`Input number, ${avalibleDirections.join(', ')}, -1 if (x)`));

            if(!avalibleDirections.includes(direction)){
                alert(`input correct number: ${avalibleDirections.join(', ')}`);
                continue;
            }
            return direction;
        }
    },
};

game.run();
