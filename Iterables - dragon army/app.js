function randomItem(array) {
    const min = 0;
    const max = array.length - 1;
    const random = Math.floor(Math.random() * (max - min + 1)) + min;
    return array[random];
}

function makeDragon() {
    const dragonSizes = ['mažas', 'paaugęs', 'didelis', 'milžiniškas'];
    const dragonAbilities = ['ledo', 'kalnų', 'slėnių', 'jūrų', 'paslėpsnių'];
    return `${randomItem(dragonSizes)} ${randomItem(dragonAbilities)} slibinas`;
}

const dragonArmy = {
    [Symbol.iterator]: function() {
        return {
            next: function() {
                const enoughDragonsSpawned = Math.random() > 0.95;
                if(!enoughDragonsSpawned) {
                    return {
                        value: makeDragon(),
                        done: false
                    }
                }
                return { done: true };
            }
        }
    }
}

for(const dragon of dragonArmy) {
    const node = document.createElement("li");
    const textnode = document.createTextNode(dragon);
    node.appendChild(textnode);
    document.getElementById("dragons").appendChild(node);
}