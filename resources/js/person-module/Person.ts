// /src/person.ts
export class Person {
    name: string;

    constructor(name: string) {
        this.name = name;
    }

    greet() {
        console.log(`Hello, ${this.name}!`);
    }
}
