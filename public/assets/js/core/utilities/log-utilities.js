class LogUtilities {
    static log(message) {
        console.log(message);
    }

    static logObject(message, object) {
        console.log(message);
        console.log(object);
    }

    static info(message) {
        console.info(`%c${message}.`, "color: orange;");
    }

    static warn(message) {
        console.warn(message);
    }

    static error(message) {
        console.error(message);
    }

    static group(message) {
        console.group(message);
    }

    static groupEnd() {
        console.groupEnd();
    }
}

export { LogUtilities };