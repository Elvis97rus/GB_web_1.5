"use strict";

const settings = {
    questionCount:5,
    correctAnswerCount:0,
    questions:[
        {
            text:'Почему днем светло?',
            variants:{'a': 'Из-за луны','b': 'ПотомучтоГладиолус','c': 'Солнышко освещает','d': 'Потому что весна'},
            correctAnswerIndex:'c',
        },{
            text:'Какого цвета снег?',
            variants:{'a': 'Желтый','b': 'Синий','c': 'Красный','d': 'Белый'},
            correctAnswerIndex:'d',
        },{
            text:'Когда наступит завтра?',
            variants:{'a': 'Вчера','b': 'Сегодня','c': 'Завтра','d': 'После того как поспишь'},
            correctAnswerIndex:'d',
        },{
            text:'Сколько дней в неделе?',
            variants:{'a': '5','b': '12','c': '6','d': '7'},
            correctAnswerIndex:'d',
        },{
            text:'Почему так?',
            variants:{'a': 'Потому что...','b': 'А как Иначе?','c': 'Только так!','d': 'Нипанятна:('},
            correctAnswerIndex:'c',
        },
    ],
};

const player = {
    correctAnswerCount: null,
    currentQuestion: null,

    init(){
        this.correctAnswerCount = 0;
        this.currentQuestion = 0;
    },
    scoreInc(){
        this.correctAnswerCount++;
        alert('Correct!')
    }
};

const game = {
    settings, //settings: settings,
    player, //player: player,

    /**
     * Функция запуска игры, отображения вопросов и выхода
     */
    run() {
        this.player.init();
        console.log('Game begins');

        for (let currentQuestion = 0;currentQuestion<settings.questionCount;currentQuestion++) {
            const question = settings.questions[currentQuestion];
            console.log(`Вопрос # ${currentQuestion+1}`);
            console.log(question.text);
            for (const key in question.variants) {
                console.log(`${key} - ${question.variants[key]}`);
            }
            const answer = this.getAnswer();
            if (this.userWantExit(answer))
                break;
            else
                this.isCorrect(currentQuestion,answer);
            this.player.currentQuestion = currentQuestion+1;
        }
        this.gameLog();
    },


    /**
     * Проверяет ввел ли пользователь вместо ответа информацию для выхода из игры.
     * @param {string} userAnswer Ответ пользователя.
     * @returns {boolean} true, если пользователь хотел выйти, false если нет.
     */
    userWantExit(userAnswer) {
        if(userAnswer === '-1'){
            return true;
        }
    },

    /**
     * Функция вывода очков игрока, вопросов в целом и номер последнего вопроса
     */
    gameLog(){
        alert(`у вас ${this.player.correctAnswerCount} правильных ответов,
                    всего было ${this.settings.questionCount} вопросов,
                    вы остановились на ${this.player.currentQuestion} вопросе`);
    },
    /**
     * Функция запроса ответа у пользователя, пока не даст корректный
     * @returns {string} answer - возвращает значение введенное пользователем
     */
    getAnswer(){
        const avalibleAnswers = ['-1','a','b','c','d'];
        while (true){
            const answer = prompt(`Input number, ${avalibleAnswers.join(', ')}, -1 if (x)`);
            if(!avalibleAnswers.includes(answer)){
                alert(`input correct number: ${avalibleAnswers.join(', ')}`);
                continue;
            }
            return answer;
        }
    },
    /**
     * Функция проверки правильности ответа
     * @param {int} qNumber - номер вопроса
     * @param {string} answer - ответ пользователя
     * @returns {boolean} - возвращает true если ответы совпадают
     */
    isCorrect(qNumber, answer) {
        if (settings.questions[qNumber].correctAnswerIndex === answer){
            this.player.scoreInc();
            return true;
        }
    },
};
game.run();