
export function format_number(number) {
    try {
        number = Number(number);
        return number.toLocaleString(window.DEFAULT_LOCALE, { style: 'currency', currency: window.DEFAULT_CURRENCY });
    } catch (error) {
        return ''
    }
}

