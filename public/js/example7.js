// source: 
// http://www.atpworldtour.com/Share/Event-Draws.aspx?EventId=410&Year=2013

var tree_structure = {
    chart: {
        container: "#OrganiseChart6",
        levelSeparation: 38,
        siblingSeparation: 3,
        subTeeSeparation: 2,
        scrollbar: "fancy",
        rootOrientation: "WEST",
        node: {
            HTMLclass: "tennis-draw",
            drawLineThrough: true
        },
        connectors: {
            type: "straight",
            style: {
                "stroke-width": 3,
                "stroke": "#ccc"
            }
        }
    },
    nodeStructure: {
        text: {
            name: "TROVÃO"

        },
        HTMLclass: "winner",
        children: [
            {
                text: {
                    name: "PAI",
                    desc: "PRA 122"
                },
                children: [
                    {
                        text: {
                            name: "VÔ",
                            desc: "PRA 364"
                        },
                        children: [
                            {
                                text: {
                                    name: "BISAVÔ",
                                    desc: "PRA 542"
                                }

                            },
                            {
                                text: {
                                    name: "BISAVÓ",
                                    desc: "PRA 372"
                                }

                            }
                        ]
                    },
                    {
                        text: {
                            name: "VÓ",
                            desc: "PRA 763"
                        },
                        children: [
                            {
                                text: {
                                    name: "BISAVÔ",
                                    desc: "PRA 765"
                                }

                            },
                            {
                                text: {
                                    name: "BISAVÓ",
                                    desc: "PRA 563"
                                }
                            }
                        ]
                    }
                ]
            },
            {
                text: {
                    name: "MÃE",
                    desc: "PRA 022"
                },
                children: [
                    {
                        text: {
                            name: "VÔ",
                            desc: "PRA 332"
                        },
                        children: [
                            {
                                text: {
                                    name: "BISAVÔ",
                                    desc: "PRA 102"
                                }

                            },
                            {
                                text: {
                                    name: "BISAVÓ",
                                    desc: "PRA 232"
                                }

                            }
                        ]
                    },
                    {
                        text: {
                            name: "VÓ",
                            desc: "PRA 443"
                        },
                        children: [
                            {
                                text: {
                                    name: "BISAVÔ",
                                    desc: "PRA 323"
                                }

                            },
                            {
                                text: {
                                    name: "BISAVÓ",
                                    desc: "PRA 003"
                                }
                            }
                        ]
                    }
                ]
            }
        ]
    }
};
