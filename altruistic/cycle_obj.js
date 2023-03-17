let sample = [
    {
        id: 0,
        trades: [
            [0, 1],
        ],
        visited: false
    },
    {
        id: 1,
        trades: [
            [1, 0],
            [1, 2],
        ],
        visited: false
    },
    {
        id: 2,
        trades: [
            [2, 0],
            [2, 1],
        ],
        visited: false
    },

]

let cycles = []


function detectCycle(graph, start) {
    /*
        Grpah 는 아래 형식으로 되어있다고 가정
        graph = [
            {
                id: int ###### unique number,
                trades: [
                    [int have, int want],
                    [have, want],
                    [have, want]
                ]
                visited: boolean
            },
            {
                id :
                ...
            }

        ]
    */
    cycles = []
    while(true) {
        let start_node = graph.find(d => d['visited'] == false)
        if(start_node == undefined) {
            // 더이상 방문하지 않은 node가 없음
            break
        }
        else {
            let path = []    // 현위치까지 온 경로
            dfs(graph, path, start_node['id'], undefined)
        }
    }
    //console.log(cycles)
	return cycles
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
        let node = graph.find(d => d['id'] == current)
        path.push(current)
        // 현재 node에서 건너갈 수 있는 node 체크하기
        let valid_trades = node['trades']
        if(item != undefined) {
            valid_trades = valid_trades.filter(t => t[0] == item )
        }
        for (let [have, want] of valid_trades) {
            // 건너갈 수 있는 후보 node들
            // graph의 모든 node들 중 trade의 have에 현재 node의 want와
            // 같은 값을 가지고 있는 학생들의 고유번호들을 가져온다
            let candidates = graph.filter(n => 
                n['trades'].map(t => t[0]).includes(want))
            // filter를 통해 visited candidate를 걸러낸다
            //console.log(candidates)
            candidates = candidates.filter(n => n['visited'] == false)
            //console.log(candidates)
            // candidate마다 dfs 수행
            for(candidate of candidates) {
                //console.log(candidate['id'])
                dfs(graph, path, candidate['id'], want)
            }
        }
        node['visited'] = true
    }
    
}

//detectCycle(sample, 0)