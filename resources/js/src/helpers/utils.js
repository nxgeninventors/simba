

export const getElementNumber = (elementId) => {
    try {
        return elementId.match(/\d+/)[0];
    } catch (error) {
        console.error(error);
    }
}