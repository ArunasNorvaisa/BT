function randomItem(array) {
    const min = 0;
    const max = array.length - 1;
    const random = Math.floor(Math.random() * (max - min + 1)) + min;
    return array[random];
}

function makeDragon() {
    const dragonSizes = ['mažas', 'paaugęs', 'didelis', 'milžiniškas'];
    const dragonColors = ['geltonas', 'raudonas', 'oranžinis', 'margas', 'ugninis'];
    const dragonAbilities = ['ledo', 'kalnų', 'slėnių', 'jūrų', 'paslėpsnių'];
    return `${randomItem(dragonSizes)} ${randomItem(dragonColors)} ${randomItem(dragonAbilities)} slibinas`;
}

/**********************************************
 *             JS ITERATOR VERSION            *
 **********************************************/

/* const dragonArmy = {
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
} */

/**********************************************
 *              VANILLA JS VERSION            *
 **********************************************/

function dragonArmyCreate() {
    let enoughDragonsSpawned = Math.random() > 0.95;
    let dragons = [];
    while(!enoughDragonsSpawned) {
        dragons.push(makeDragon());
        enoughDragonsSpawned = Math.random() > 0.95;
    }
    return dragons;
}

function renderDragonArmy(array) {
    for(let i = 0; i < array.length; i++) {
        const node = document.createElement("li");
        const textnode = document.createTextNode(array[i]);
        node.appendChild(textnode);
        document.getElementById("dragons").appendChild(node);
    }
}

const dragonArmy = dragonArmyCreate();
renderDragonArmy(dragonArmy);
