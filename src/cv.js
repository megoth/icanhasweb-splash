(function ($) {
    var populate = function (data) {
        var element = $(this);
        data.knowledge.forEach(function (k) {
            $("<h4>").text(k.name).appendTo(element);
            var knowledge = $("<div>").addClass("block-skills");
            k.topics.forEach(function (t) {
                var topic = $("<div>").addClass("grid-item").attr({ "id": "skills-" + t.name.toLowerCase() }),
                    topicList = $("<dl>").addClass("list-skills");
                $("<h5>").text(t.name).appendTo(topic);
                t.skills.forEach(function (s) {
                    var skill = $("<dd>").addClass("progress"),
                        attained = s.attained * 10,
                        aspire = s.aspire * 10 - attained;
                    $("<dt>").text(s.name).appendTo(topicList);
                    $("<div>").addClass("bar bar-success").css("width", attained + "%").text(s.attained + "/10").appendTo(skill);
                    if (aspire > 0) {
                        $("<div>").addClass("bar bar-warning").css("width", aspire + "%").text(s.aspire + "/10").appendTo(skill);
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