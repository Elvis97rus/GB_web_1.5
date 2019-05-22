describe('Соответствие значений', () => {
    it('Проверка а на значение 10', () => {
        let a = 10; // то, что проверяем
        expect(a).toBe(10); // 10 - эталон
        // expect(a).toBe(9); // 10 - эталон
    })
});
describe('Дополнительные функции', () => {
    it('Сравнение объектов', () => {
        let user1 = {
            name: 'John',
            age: 20
        };
        let user2 = {
            name: 'John',
            age: 20
        };
        expect(user1).toEqual(user2);

        // expect().toBeNull()
        // expect().toBeUndefined()
        // expect().toBeTruthy()
        // expect().toBeFalsy()
        // expect().toBeNaN()
        // expect().toBeLessThan()
        // expect().toBeLessThanOrEqual()
        // expect().toBeGreaterThan();
        // expect().toBeGreaterThanOrEqual();
        // expect().toBeCloseTo()
    });
    it('Работа с массивом', () => {
        let arr = ['white', 'black', 'orange'];

        expect(arr).toContain('white');
        expect(arr).not.toContain('red');
    });
    it('Работа с regexp', () => {
        let arr = 'Test AbcD jasmine';

        expect(arr).toMatch(/abcd/i);
        expect(arr).not.toMatch(/abcd/);
        // expect(arr).not.toContain('red');
    })
});