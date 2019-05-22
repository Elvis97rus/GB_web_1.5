const pow = (x, n) => {
    if(x < 0 || n < 0){
        return null
    }
    let result = 1;
    for (let i = 0; i < n; i++){
        result *= x;
    }
    return result;
}

module.exports = pow;