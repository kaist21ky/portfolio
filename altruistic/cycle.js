let sample = [
    [
        0,
        [
            [0, 1],
        ],
        false
    ],
    [
        1,
        [
            [1, 0],
            [1, 2],
        ],
        false
    ],
    [
        2,
        [
            [2, 0],
            [2, 1],
        ],
        false
    ],

]

let cycles = []


function detectCycle(graph) {
    /*
        Grpah 는 아래 형식으로 되어있다고 가정
        graph = [
            [
                int id,
                [
                    [int have, int want],
                    [have, want],
                    [have, want]
                ],
                boolean visited
            ],
            [
                id :
                ...
            ]
        ]
    */
    cycles = []
    while(true) {
        let start_node = graph.find(d => d[2] == false)
        if(start_node == undefined) {
            // 더이상 방문하지 않은 node가 없음
            break
        }
        else {
            let path = []    // 현위치까지 온 경로
            dfs(graph, path, start_node[0], undefined)
        }
    }
    console.log(cycles)
}
function dfs(graph, path, current, item) {
    //console.log(path, current)
    
    // Cycle 생성
    if(path.includes(current)) {
        // 완성 cycle
        let index = path.indexOf(current)
        cycles.push(path.slice(index))
    }
    else {
        // 현재 node
        let node = graph.find(d => d[0] == current)
        path.push(current)
        // 현재 node에서 건너갈 수 있는 node 체크하기
        let valid_trades = node[1]
        if(item != undefined) {
            valid_trades = valid_trades.filter(t => t[0] == item )
        }
        for (let [have, want] of valid_trades) {
            // 건너갈 수 있는 후보 node들
            // graph의 모든 node들 중 trade의 have에 현재 node의 want와
            // 같은 값을 가지고 있는 학생들의 고유번호들을 가져온다
            let candidates = graph.filter(n => 
                n[1].map(t => t[0]).includes(want))
            // filter를 통해 visited candidate를 걸러낸다
            candidates = candidates.filter(n => n[2] == false)
            // candidate마다 dfs 수행
            for(candidate of candidates) {
                //console.log(candidate['id'])
                dfs(graph, path, candidate[0], want)
            }
        }
        node[2] = true
    }
    
}

detectCycle(sample)