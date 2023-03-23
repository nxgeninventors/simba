import ProjectsDatatable from './datatable';
const ProjectsCtrl = function () {

    const init = () => {
        // tinyMce = tinyMceUtils();
        // tinyMce.initalize("tiny-meeting-notes");

        ProjectsDatatable().initalize();
    }


    return { init };
};

export default ProjectsCtrl;