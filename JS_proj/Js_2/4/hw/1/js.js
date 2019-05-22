class Replace {
    getReplaced() {
        fetch(`texttoreplace.txt`)
            .then(result => {
                let c = result.text();
                console.log(c);
                return c;
            })
            .then(data => {
                console.log(data.replace(/'/gi,'"'));
            })
            .catch(error => {
                console.log(error)
            });
    }

    getReplacedSmart() {
        fetch(`texttoreplace.txt`)
            .then(result => {
                let c = result.text();
                console.log(c);
                return c;
            })
            .then(data => {
                console.log(data.replace(/\B'/gi,'"'));
            })
            .catch(error => {
                console.log(error)
            });
    }
}

let text = new Replace();

text.getReplaced();
text.getReplacedSmart();