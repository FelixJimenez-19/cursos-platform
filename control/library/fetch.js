let fetch_query = (formData, route) => {
    return fetch(route, {
        method: "POST",
        headers: new Headers().append('Accept', 'application/json'),
        body: formData
    }).then(res => {
        // console.log(res);
        return res.json();
    }).then(res => {
        // console.log(res);
        return res;
    });
}