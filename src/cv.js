(function ($) {
    var create = function (element) {
            return $(document.createElement(element));
        },
        populate = function (data) {
        var element = $(this);
        if (!data["knowledge"]) {
            element.text("Didn't resolve any data to show...");
            return;
        }
        data["knowledge"].forEach(function (k) {
            create("h4").text(k.name).appendTo(element);
            var knowledge = create("div").addClass("block-skills");
            k["topics"].forEach(function (t) {
                var topic = create("div").addClass("grid-item").attr({ "id": "skills-" + t.name.toLowerCase() }),
                    topicList = create("dl").addClass("list-skills");
                create("h5").text(t.name).appendTo(topic);
                t["skills"].forEach(function (s) {
                    var skill = create("dd").addClass("progress progress-striped"),
                        attained = s["attained"] * 10,
                        aspire = s["aspire"] * 10 - attained;
                    create("dt").text(s.name).appendTo(topicList);
                    create("div").addClass("bar bar-success").css("width", attained + "%").text(s["attained"] + "/10").appendTo(skill);
                    if (aspire > 0) {
                        create("div").addClass("bar bar-warning").css("width", aspire + "%").text(s["aspire"] + "/10").appendTo(skill);
                    }
                    skill.appendTo(topicList);
                });
                topicList.appendTo(topic);
                topic.appendTo(knowledge);
                knowledge.appendTo(element);
            });
        });
    };
    $.fn.CV = function (path) {
        $.get(path, function (data) {
            return this.each(function () {
                populate.call(this, data);
            });
        }.bind(this));
    };
}(jQuery));