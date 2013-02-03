<?php include("header.php"); ?>
<ul class="nav nav-pills">
    <li>
        <a href="#description">Description</a>
    </li>
    <li>
        <a href="#work">Work Experience</a>
    </li>
    <li>
        <a href="#education">Education</a>
    </li>
    <li>
        <a href="#skills">Skills</a>
    </li>
    <li>
        <a href="#projects">Projects</a>
    </li>
    <li>
        <a href="#voluntary">Voluntary Work and Honorary Positions</a>
    </li>
</ul>
<div class="block-content" id="primary">
    <h2>Curriculum Vitae</h2>
    <dl>
        <dt>Full name<dt>
        <dd>Arne Hassel</dd>
        <dt>Date of birth</dt>
        <dd>December 5th, 1984</dd>
    </dl>

    <section id="description">
        <h3>Description</h3>
        <p>Arne Hassel has M.Sc. from the Department of Informatics, University of Oslo, Norway, as well as a B.Ec. from University of Life Sciences, Ås, Norway.</p>
    </section>

    <section id="work">
        <h3>Relevant Work Experience</h3>
        <dl>
            <dt>2008-</dt>
            <dd>System Developer, Centre for Shared Decision making and Collaborative Care Research</dd>
        </dl>
    </section>

    <section id="education">
        <h3>Education</h3>
        <dl>
            <dt>2007-2012</dt>
            <dd><a href="http://www.uio.no/studier/program/inf-prof/distribuerte-systemer/">M.Sc., Master in Distributed Systems and Networks, University of Oslo, Oslo, Norway</a></dd>
            <dt>2003-2007</dt>
            <dd><a href="http://www.umb.no/studietilbud/artikkel/bachelor-i-okonomi-og-administrasjon">B.Ec., Bachelor of Economics, University of Life Sciences, Ås, Norway</a></dd>
        </dl>
    </section>

    <section id="skills">
        <h3>Skills</h3>
        <p>This section provide an overview of my professional, personal, and social skills. It uses a series of diagrams, ranging from 0 to 10, where 0 is no knowledge, and 10 is top knowledge. The diagrams shows my attained status in green, and the status I aspire in yellow.</p>
        <p>The data is fetched from a JSON-file, and therefore requires JavaScript.</p>
        <div id="CvSkills"></div>
    </section>

    <section id="projects">
        <h3>Projects</h3>
        <section>
            <h4>Individuell Plan</h4>
            <dl>
                <dt>Period</dt>
                <dd>2012-</dd>
                <dt>Role</dt>
                <dd>Developer</dd>
                <dt>Technology</dt>
                <dd>.NET MVC, Microsoft SQL Server, NHibernate, MassTransit, Angular, jQuery, LESS, Bootstrap</dd>
            </dl>
        </section>
        <section>
            <h4>Connect 2.0</h4>
            <dl>
                <dt>Period</dt>
                <dd>2009-</dd>
                <dt>Role</dt>
                <dd>Developer</dd>
                <dt>Technology</dt>
                <dd>.NET MVC, Microsoft SQL Server, NHibernate, jQuery, LESS, Bootstrap</dd>
            </dl>
        </section>
        <section>
            <h4>Connect Pårørende</h4>
            <p>Part of Connect 2.0.</p>
            <dl>
                <dt>Period</dt>
                <dd>2011-2012</dd>
                <dt>Role</dt>
                <dd>Developer</dd>
                <dt>Technology</dt>
                <dd>.NET MVC, Microsoft SQL Server, NHibernate, jQuery, LESS</dd>
            </dl>
        </section>
        <section>
            <h4>CommuniCare tools</h4>
            <dl>
                <dt>Period</dt>
                <dd>2010-</dd>
                <dt>Role</dt>
                <dd>Lead developer</dd>
                <dt>Technology</dt>
                <dd>Umbraco, Microsoft SQL Server, LESS</dd>
            </dl>
        </section>
        <section>
            <h4>Connect Sisom</h4>
            <p>Part of Connect 2.0.</p>
            <dl>
                <dt>Period</dt>
                <dd>2010-2011</dd>
                <dt>Role</dt>
                <dd>Developer</dd>
                <dt>Technology</dt>
                <dd>.NET MVC, Microsoft SQL Server, NHibernate, jQuery, LESS, Flash</dd>
            </dl>
        </section>
        <section>
            <h4>Spørsmål- og Svartjenesten</h4>
            <p>Part of Connect 2.0.</p>
            <dl>
                <dt>Period</dt>
                <dd>2009-</dd>
                <dt>Role</dt>
                <dd>Developer</dd>
                <dt>Technology</dt>
                <dd>.NET MVC, Microsoft SQL Server, NHibernate, jQuery, LESS</dd>
            </dl>
        </section>
    </section>

    <section id="voluntary">
        <h3>Voluntary Work and Honorary Positions</h3>
        <dl>
            <dt>2012-</dt>
            <dd><a href="http://holderdeord.no">Holder de ord</a>: Developer.</dd>
            <dt>2009-</dt>
            <dd><a href="http://cyb.no/">Cybernetisk Selskab</a>: Member of board (Treasurer), Member of Sponsor Board, Guard. Currently volunteer as an archivist and help maintain the alumni contact.</dd>
            <dt>2010-2011</dt>
            <dd>
                Birthday Party at Ole-Johan Dahls hus September 2nd
                <ul>
                    <li>Planned, executed and completed the follow-up associated with the Birthday Party in the occasion of the 200-year celebration of University of Oslo.</li>
                    <li>Cooperated with the department and UiO:200, the Anniversary Secreatariat, and executed a party for almost 5 000 people.</li>
                </ul>
            </dd>
            <dt>2003-2007</dt>
            <dd><a href="http://iaeste.no/">IAESTE</a>: Computer Manager, Leader, Treasurerer, Vice Leader</dd>
            <dt>2004, 2006</dt>
            <dd><a href="http://www.ukaiaas.no/">Uka i Ås</a>: Webmaster, Guard</dd>
        </dl>
    </section>
</div>

<script type="text/javascript" src="lib/jQuery/jquery-1.9.0.js"></script>
<script type="text/javascript" src="src/cv.js"></script>
<script type="text/javascript">
    (function ($) {
        $("#CvSkills").CV("data/cv.json");
    }($));
</script>