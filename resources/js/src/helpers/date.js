import moment from 'moment';

export const formatDateTime = (timestamp) => {
    try {
        const dateObj = moment(timestamp);
        return `${dateObj.format('MMM DD, YYYY')} ${dateObj.format('hh:mm:ss')}`;
    } catch (error) {
        return timestamp;
    }
}

export const formatDate = (timestamp) => {
    try {
        const dateObj = moment(timestamp);
        return `${dateObj.format('MMM DD, YYYY')}`;
    } catch (error) {
        return timestamp;
    }
    
}