var icons = {
    default: {
        blue: {
            iconUrl: 'mapp/assets/images/marker-default-blue.svg',
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -40],
        },
        red: {
            iconUrl: 'mapp/assets/images/marker-default-red.svg',
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -40],
        },
        green: {
            iconUrl: 'mapp/assets/images/marker-default-green.svg',
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -40],
        },
    },
    circle: {
        white: {
            iconUrl: 'mapp/assets/images/marker-circle-white.svg',
            iconSize: [8, 8],
	        iconAnchor: [4, 4],
	        popupAnchor: [0, -4]
        },
    },
    route: {
        start: {
            iconUrl: '.mapp/assets/images/marker-start-route.png',
            iconSize: [40, 40],
            iconAnchor: [20, 35],
            popupAnchor: [0, -35]
        },
        end: {
            iconUrl: '.mapp/assets/images/marker-end-route.png',
            iconSize: [40, 40],
            iconAnchor: [20, 35],
            popupAnchor: [0, -35]
        }
    },
    editor: {
        blue: {
            iconUrl: 'mapp/assets/images/marker-default-blue.svg',
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -40],
        },
    },
    poi: {
        blue: {
            iconUrl: 'mapp/assets/images/marker-default-red.svg',
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -40],
        },
        restaurant: {
            iconUrl: 'mapp/assets/images/marker-restaurant.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        bank: {
            iconUrl: 'mapp/assets/images/marker-bank.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        cafe: {
            iconUrl: 'mapp/assets/images/marker-cafe.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        library: {
            iconUrl: 'mapp/assets/images/marker-library.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        hotel: {
            iconUrl: 'mapp/assets/images/marker-hotel.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        mosque: {
            iconUrl: 'mapp/assets/images/marker-mosque.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        hospital: {
            iconUrl: 'mapp/assets/images/marker-hospital.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        metro: {
            iconUrl: 'mapp/assets/images/marker-metro.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        drugstore: {
            iconUrl: 'mapp/assets/images/marker-drugstore.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        parking: {
            iconUrl: 'mapp/assets/images/marker-parking.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        university: {
            iconUrl: 'mapp/assets/images/marker-university.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        mall: {
            iconUrl: 'mapp/assets/images/marker-mall.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
        gasStation: {
            iconUrl: 'mapp/assets/images/marker-gas-station.svg',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
        },
    }
}

var styles = {
    default: {
        polyline: {
            stroke: true,
            color: '#FB8C00',
            weight: 3,
            opacity: .75,
            smoothFactor: 1,
            fill: false,
            fillColor: '#FFFFFF',
            fillOpacity: .6,
            clickable: true,
            // dashArray: '10 5',
        },
        polygon: {
            stroke: true,
            color: '#FB8C00',
            weight: 3,
            opacity: .75,
            smoothFactor: 1,
            fill: true,
            fillColor: '#FFFFFF',
            fillOpacity: .6,
            clickable: true,
            // dashArray: '10 5',
        },
    },
    editor: {
        point: {
            stroke: true,
            color: '#4584f0',
            weight: 5,
            opacity: .75,
            smoothFactor: 1,
            fill: true,
            fillColor: '#FFFFFF',
            fillOpacity: .3,
            clickable: true,
            // dashArray: '10 5',
        },
        polyline: {
            stroke: true,
            color: '#4584f0',
            weight: 5,
            opacity: .75,
            smoothFactor: 1,
            fill: false,
            fillColor: '#FFFFFF',
            fillOpacity: .3,
            clickable: true,
            // dashArray: '10 5',
        },
        polygon: {
            stroke: true,
            color: '#4584f0',
            weight: 5,
            opacity: .75,
            smoothFactor: 1,
            fill: true,
            fillColor: '#FFFFFF',
            fillOpacity: .3,
            clickable: true,
            // dashArray: '10 5',
        },
    },
    poi: {
        polyline: {
            stroke: true,
            color: '#FB8C00',
            weight: 3,
            opacity: .75,
            smoothFactor: 1,
            fill: false,
            fillColor: '#FFFFFF',
            fillOpacity: .3,
            clickable: true,
            dashArray: '10 5',
        },
        polygon: {
            stroke: true,
            color: '#FB8C00',
            weight: 3,
            opacity: .75,
            smoothFactor: 1,
            fill: true,
            fillColor: '#FFFFFF',
            fillOpacity: .3,
            clickable: true,
            dashArray: '10 5',
        },
    },
    measurement: {
        polyline: {
            stroke: true,
            color: '#FB8C00',
            weight: 3,
            opacity: .75,
            smoothFactor: 1,
            fill: false,
            fillColor: '#FFFFFF',
            fillOpacity: .3,
            clickable: true,
            dashArray: '10 5',
        },
        polygon: {
            stroke: true,
            color: '#FB8C00',
            weight: 3,
            opacity: .75,
            smoothFactor: 1,
            fill: true,
            fillColor: '#FFFFFF',
            fillOpacity: .3,
            clickable: true,
            dashArray: '10 5',
        },
    },
    layerManagement: {
        polyline: {
            stroke: true,
            color: '#FB8C00',
            weight: 3,
            opacity: .75,
            smoothFactor: 1,
            fill: false,
            fillColor: '#FFFFFF',
            fillOpacity: .3,
            clickable: true,
            dashArray: '10 5',
        },
        polygon: {
            stroke: true,
            color: '#FB8C00',
            weight: 3,
            opacity: .75,
            smoothFactor: 1,
            fill: true,
            fillColor: '#FFFFFF',
            fillOpacity: .3,
            clickable: true,
            dashArray: '10 5',
        },
    },
    routing: {
        polyline: {
            driving: {
                styles: [{
                        color: '#1E4149',
                        opacity: 0.15,
                        weight: 9
                    },
                    {
                        color: '#F85656',
                        opacity: 0.8,
                        weight: 4
                    },
                    {
                        color: '#F50202',
                        opacity: 1,
                        weight: 2
                    }
                ]
            },
            foot: {
                styles: [{
                        color: '#1E4149',
                        opacity: 0.15,
                        weight: 9
                    },
                    {
                        color: '#5295FF',
                        opacity: 0.8,
                        weight: 4
                    },
                    {
                        color: '#4285F4',
                        opacity: 1,
                        weight: 2
                    }
                ]
            },
            bicycle: {
                styles: [{
                        color: '#1E4149',
                        opacity: 0.15,
                        weight: 9
                    },
                    {
                        color: '#33DC75',
                        opacity: 0.8,
                        weight: 4
                    },
                    {
                        color: '#23BC65',
                        opacity: 1,
                        weight: 2
                    }
                ]
            }
        }
    },
}
