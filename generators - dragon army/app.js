function randomItem(array) {
    const min = 0;
    const max = array.length - 1;
    const random = Math.floor(Math.random() * (max - min + 1)) + min;
    return array[random];
}

function makeDragon() {
    const dragonSizes = [
        'Mažytis',
        'Mažas',
        'Paaugęs',
        'Didelis',
        'Milžiniškas',
        'Sabonio dydžio'
    ];
    const dragonColors = [
        'geltonas',
        'raudonas',
        'oranžinis',
        'margas',
        'supelyjęs'
    ];
    const dragonAbilities = [
        'ledinis',
        'kalnų',
        'slėnių',
        'jūrinis',
        'paslėpsnių',
        'pakalnių',
        'viršukalnių',
        'trigalvis',
        'devyngalvis',
        'didžiagalvis',
        'ugninis'
    ];
    return `${randomItem(dragonSizes)} ${randomItem(dragonColors)} ${randomItem(dragonAbilities)} slibinas`;
}

const dragonArmy = {
    [Symbol.iterator]: function*() {
        while(true) {
            const enoughDragonsSpawned = Math.random() > 0.85;
            if(enoughDragonsSpawned) {
                return;
            }
            yield makeDragon();
        }
    }
}

for (const dragon of dragonArmy) {
    const node = document.createElement("li");
    const textnode = document.createTextNode(dragon);
    node.appendChild(textnode);
    const el = document.getElementById("dragons");
    el.appendChild(node);
}
