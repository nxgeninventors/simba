import moment from 'moment';

export const formatDateTime = (timestamp) => {
    try {
        const dateObj = moment(timestamp);
        return `${dateObj.format('DD-MMM-YYYY')} ${dateObj.format('hh:mm:ss')}`;
    } catch (error) {
        return timestamp;
    }
    
}