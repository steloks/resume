flatpickr($('#region_start_at'), {
    altInput: false,
    static: true,
    clickOpens: true,
    theme: 'airbnb',
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
});

flatpickr($('#region_end_at'), {
    altInput: false,
    static: true,
    clickOpens: true,
    theme: 'airbnb',
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
});

flatpickr($('#shoppingDate'), {
    altInput: false,
    clickOpens: true,
    theme: 'airbnb',
    locale: {
        "firstDayOfWeek": 1 // start week on Monday
    },
    dateFormat: "d-m-Y",
});

flatpickr($('#batchUseDate'), {
    altInput: false,
    clickOpens: true,
    theme: 'airbnb',
    locale: {
        "firstDayOfWeek": 1 // start week on Monday
    },
    dateFormat: "d-m-Y",
});

flatpickr($('#batchPurchaseDate'), {
    altInput: false,
    clickOpens: true,
    theme: 'airbnb',
    locale: {
        "firstDayOfWeek": 1 // start week on Monday
    },
    dateFormat: "d-m-Y",
});

flatpickr($('#orderCreatedAt'), {
    altInput: false,
    clickOpens: true,
    theme: 'airbnb',
    locale: {
        "firstDayOfWeek": 1 // start week on Monday
    },
    dateFormat: "d-m-Y",
});

flatpickr($('#deliveryDateRecipe'), {
    altInput: false,
    clickOpens: true,
    theme: 'airbnb',
    locale: {
        "firstDayOfWeek": 1 // start week on Monday
    },
    dateFormat: "d-m-Y",
});

flatpickr($('#Dateofissue'), {
    altInput: false,
    clickOpens: true,
    theme: 'airbnb',
    locale: {
        "firstDayOfWeek": 1 // start week on Monday
    },
    dateFormat: "d-m-Y",
});
